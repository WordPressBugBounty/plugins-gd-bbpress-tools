<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<h2 class="entry-title"><?php bbp_is_user_home() ? esc_html_e( 'Your Forum Signature', 'gd-bbpress-tools' ) : esc_html_e( 'User Forum Signature', 'gd-bbpress-tools' ); ?></h2>
<fieldset class="bbp-form">
    <legend><?php bbp_is_user_home() ? esc_html_e( 'Your Forum Signature', 'gd-bbpress-tools' ) : esc_html_e( 'User Forum Signature', 'gd-bbpress-tools' ); ?></legend>
    <?php do_action( 'bbp_user_edit_before_signature' ); ?>
    <div>
        <label for="signature"><?php esc_html_e( 'Signature', 'gd-bbpress-tools' ); ?></label>
        <fieldset class="bbp-form">
            <textarea name="signature" id="signature" rows="5" cols="30" style="width: 100%;"><?php echo esc_textarea( $_signature ?? '' ); ?></textarea>
            <span class="description">
                <?php echo sprintf( esc_html__( 'Signature length is limited to %s characters.', 'gd-bbpress-tools' ), ( $this->max_length ?? 512 ) ); ?><br/>
                <?php do_action( 'bbp_user_edit_signature_info' ); ?>
            </span>
        </fieldset>
    </div>
    <?php do_action( 'bbp_user_edit_after_signature' ); ?>
</fieldset>
