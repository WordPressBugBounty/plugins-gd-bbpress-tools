<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GDBTOModSignature {
	public bool $active = false;
	public int $max_length;
	public bool $enhanced;
	public string $method;
	public $profile_group;

	public bool $bbcodes = false;
	public bool $html = false;

	public function __construct( $max_length = 512, $enhanced = true, $method = 'bbcode', $profile_group = 1 ) {
		$this->max_length    = absint( $max_length );
		$this->enhanced      = $enhanced;
		$this->method        = $method;
		$this->profile_group = $profile_group;

		if ( $this->enhanced ) {
			if ( $method == 'bbcode' || $method == 'full' ) {
				$this->bbcodes = true;
			}

			if ( $method == 'html' || $method == 'full' ) {
				$this->html = true;
			}
		}

		add_action( 'bbtoolbox_init', array( $this, 'init' ) );
	}

	public function init() : void {
		if ( $this->active ) {
			add_action( 'show_user_profile', array( $this, 'editor_form_profile' ) );
			add_action( 'edit_user_profile', array( $this, 'editor_form_profile' ) );
			add_action( 'edit_user_profile_update', array( $this, 'editor_save' ) );
			add_action( 'personal_options_update', array( $this, 'editor_save' ) );
			add_action( 'xprofile_updated_profile', array( $this, 'editor_save' ) );

			add_action( 'bbp_user_edit_after', array( $this, 'editor_form_bbpress' ) );
			add_action( 'bbp_user_edit_signature_info', array( $this, 'signature_info' ) );

			add_action( 'bp_custom_profile_edit_fields', array( $this, 'editor_form_buddypress' ) );
		}

		$this->add_content_filters();
	}

	public function add_content_filters() : void {
		add_filter( 'bbp_get_topic_content', array( $this, 'reply_content' ), 10000, 2 );
		add_filter( 'bbp_get_reply_content', array( $this, 'reply_content' ), 10000, 2 );
	}

	public function remove_content_filters() : void {
		remove_filter( 'bbp_get_topic_content', array( $this, 'reply_content' ), 10000 );
		remove_filter( 'bbp_get_reply_content', array( $this, 'reply_content' ), 10000 );
	}

	public function editor_form_profile( $profile_user ) : void {
		if ( ! is_admin() ) {
			return;
		}

		if ( $profile_user instanceof WP_User ) {
			$old_filter           = $profile_user->filter;
			$profile_user->filter = 'display';

			$_signature = d4p_bbp_update_shorthand_bbcodes( $profile_user->signature );

			$profile_user->filter = $old_filter;

			wp_nonce_field( 'gdbbptools_save_signature_' . $profile_user->ID, 'gdbbptools_signature_nonce', false );
		}

		/**
		 * Filters the signature editor template for WordPress and bbPress profile forms.
		 *
		 * @param string $file Absolute path to the PHP template for the current profile form.
		 */
		include_once( apply_filters( 'd4p_bbpresstools_signature_editor_file', GDBBPRESSTOOLS_PATH . 'forms/tools/signature_profile.php' ) );
	}

	public function editor_form_bbpress() : void {
		$_signature = d4p_bbp_update_shorthand_bbcodes( bbp_get_displayed_user_field( 'signature' ) );
		wp_nonce_field( 'gdbbptools_save_signature_' . bbp_get_displayed_user_id(), 'gdbbptools_signature_nonce', false );

		/** This filter is documented in code/mods/signature.php. */
		$form = apply_filters( 'd4p_bbpresstools_signature_editor_file', GDBBPRESSTOOLS_PATH . 'forms/tools/signature_bbpress.php' );
		include_once( $form );
	}

	public function editor_form_buddypress() : void {
		if ( ! function_exists( 'bp_get_current_profile_group_id' ) ) {
			return;
		}

		if ( bp_get_current_profile_group_id() == $this->profile_group ) {
			$user_id = bp_displayed_user_id();

			if ( $user_id > 0 ) {
				$_signature = d4p_bbp_update_shorthand_bbcodes( get_user_meta( $user_id, 'signature', true ) );
				wp_nonce_field( 'gdbbptools_save_signature_' . $user_id, 'gdbbptools_signature_nonce', false );

				/**
				 * Filters the signature editor template for the configured BuddyPress profile group.
				 *
				 * @param string $file Absolute path to the BuddyPress PHP template.
				 */
				$form = apply_filters( 'd4p_bbpresssignature_bbpress_editor_file', GDBBPRESSTOOLS_PATH . 'forms/tools/signature_buddypress.php' );
				include_once( $form );
			}

			remove_action( 'bp_custom_profile_edit_fields', array( $this, 'editor_form_buddypress' ) );
		}
	}

	public function signature_info() : void {
		$message = array();

		if ( ! $this->html && ! $this->bbcodes ) {
			$message[] = __( 'You can use only plain text. HTML and BBCodes will be stripped.', 'gd-bbpress-tools' );
		} else {
			if ( $this->html ) {
				$message[] = __( 'You can use HTML.', 'gd-bbpress-tools' );
			}

			if ( $this->bbcodes ) {
				$message[] = __( 'You can use BBCodes.', 'gd-bbpress-tools' );
			}

			if ( ! $this->html ) {
				$message[] = __( 'HTML will be stripped.', 'gd-bbpress-tools' );
			}

			if ( ! $this->bbcodes ) {
				$message[] = __( 'BBCodes will be stripped.', 'gd-bbpress-tools' );
			}
		}

		echo esc_html( join( ' ', $message ) );
	}

	public function format_signature( $sig ) : string {
		if ( ! $this->html ) {
			$sig = wp_strip_all_tags( $sig );
		}

		if ( ! $this->bbcodes ) {
			$sig = strip_shortcodes( $sig );
		}

		$sig = $this->html ? $this->sanitize_signature_html( $sig ) : wp_kses( $sig, array() );

		if ( strlen( $sig ) > $this->max_length ) {
			$sig = substr( $sig, 0, $this->max_length );
		}

		return trim( $sig );
	}

	private function sanitize_signature_html( string $sig ) : string {
		// Keep formatting while excluding IDs, form controls, and classes used by other UI components.
		$attributes = array(
			'class' => array(
				'value_callback' => static function ( $value ) {
					return preg_match( '/\A(?:d4pbbc-[a-z0-9-]+|d4p-bbt-quote-title|wp-smiley)\z/', $value ) === 1;
				},
			),
			'style' => true,
			'title' => true,
		);

		$tags = array_fill_keys( array(
			'abbr', 'b', 'br', 'caption', 'cite', 'code', 'dd', 'div', 'dl', 'dt', 'em', 'fieldset',
			'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'hr', 'i', 'kbd', 'legend', 'li', 'mark', 'p', 'pre',
			's', 'samp', 'small', 'span', 'strong', 'sub', 'sup', 'table', 'tbody', 'tfoot', 'thead', 'tr',
			'u', 'ul', 'var',
		), $attributes );

		$tags['a']          = $attributes + array( 'href' => true, 'rel' => true, 'target' => true );
		$tags['bdo']        = $attributes + array( 'dir' => true );
		$tags['blockquote'] = $attributes + array( 'cite' => true );
		$tags['img']        = $attributes + array( 'src' => true, 'alt' => true, 'width' => true, 'height' => true );
		$tags['ol']         = $attributes + array( 'start' => true, 'reversed' => true );
		$tags['td']         = $attributes + array( 'colspan' => true, 'rowspan' => true );
		$tags['th']         = $tags['td'] + array( 'scope' => true );

		/**
		 * Filters the HTML allowlist for formatted signatures at save and render time.
		 *
		 * @param array $tags Allowed HTML tags and their attributes.
		 */
		$tags = apply_filters( 'd4p_bbpresstools_signature_allowed_html', $tags );

		return wp_kses( $sig, $tags );
	}

	public function editor_save( $user_id ) : void {
		if ( ! is_string( $_POST['signature'] ?? null ) || ! is_string( $_POST['gdbbptools_signature_nonce'] ?? null ) ) {
			return;
		}

		if ( ! wp_verify_nonce( wp_unslash( $_POST['gdbbptools_signature_nonce'] ), 'gdbbptools_save_signature_' . $user_id ) ) {
			return;
		}

		$sig = $this->format_signature( wp_unslash( $_POST['signature'] ) );

		update_user_meta( $user_id, 'signature', wp_slash( $sig ) );
	}

	public function reply_content( $content, $reply_id = 0 ) {
		if ( $reply_id == 0 ) {
			global $post;

			$user_id = $post->post_author;
		} else {
			$user_id = bbp_get_reply_author_id( $reply_id );
		}

		$signature = get_user_meta( $user_id, 'signature', true );

		$sig = d4p_bbp_update_shorthand_bbcodes( $signature );

		if ( $sig != $signature ) {
			update_user_meta( $user_id, 'signature', wp_slash( $sig ), $signature );
		}

		if ( $sig != '' ) {
			$sig = convert_smilies( $sig );
			$sig = convert_chars( $sig );
			$sig = wpautop( $sig );
			$sig = shortcode_unautop( $sig );
			$sig = do_shortcode( $sig );
			$sig = $this->sanitize_signature_html( $sig );

			if ( trim( $sig ) !== '' ) {
				$content .= '<div class="bbp-signature">' . $sig . '</div>';
			}
		}

		return $content;
	}
}
