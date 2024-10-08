<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php if ( isset( $_GET["settings-updated"] ) && $_GET["settings-updated"] == "true" ) { ?>
    <div class="updated settings-error" id="setting-error-settings_updated">
        <p><strong><?php _e( 'Settings saved.', 'gd-bbpress-tools' ); ?></strong></p>
    </div>
<?php } ?>

<form action="" method="post">
	<?php wp_nonce_field( "gd-bbpress-tools" ); ?>
    <div class="d4p-settings">
        <fieldset>
            <h3><?php _e( 'Allowed HTML tags and attributes', 'gd-bbpress-tools' ); ?></h3>
            <p><?php _e( 'By default, only keymasters can post unrestricted HTML, other users are limited to a very small subset of tags. With this option, you can change the scope of tags and tag attributes bbPress will allow for topics and replies.', 'gd-bbpress-tools' ); ?></p>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row"><label for="kses_allowed_override"><?php _e( 'Allowed HTML', 'gd-bbpress-tools' ); ?></label></th>
                    <td>
                        <select id="kses_allowed_override" name="kses_allowed_override" class="regular-text">
                            <option value="bbpress"<?php if ( $options["kses_allowed_override"] == "bbpress" ) {
								echo ' selected="selected"';
							} ?>><?php _e( 'bbPress Default Set', 'gd-bbpress-tools' ); ?></option>
                            <option value="expanded"<?php if ( $options["kses_allowed_override"] == "expanded" ) {
								echo ' selected="selected"';
							} ?>><?php _e( 'Expanded Set (Recommended)', 'gd-bbpress-tools' ); ?></option>
                            <option value="post"<?php if ( $options["kses_allowed_override"] == "post" ) {
								echo ' selected="selected"';
							} ?>><?php _e( 'Full WordPress Posts Set', 'gd-bbpress-tools' ); ?></option>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <fieldset>
            <h3><?php _e( 'Quote Topics and Replies', 'gd-bbpress-tools' ); ?></h3>
            <p><?php _e( 'Add button to quote content for a topic and reply with the author and link. Can use BBCode quote type.', 'gd-bbpress-tools' ); ?></p>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row"><label for="quote_active"><?php _e( 'Active', 'gd-bbpress-tools' ); ?></label></th>
                    <td>
                        <input type="checkbox" <?php if ( $options["quote_active"] == 1 ) {
							echo " checked";
						} ?> id="quote_active" name="quote_active"/>
                    </td>
                </tr>
                <tr class="line-on-top">
                    <th scope="row"><label for="quote_location"><?php _e( 'Button Location', 'gd-bbpress-tools' ); ?></label></th>
                    <td>
                        <select id="quote_location" name="quote_location" class="regular-text">
                            <option value="header"<?php if ( $options["quote_location"] == "header" ) {
								echo ' selected="selected"';
							} ?>><?php _e( 'Reply or Topic header', 'gd-bbpress-tools' ); ?></option>
                            <option value="content"<?php if ( $options["quote_location"] == "content" ) {
								echo ' selected="selected"';
							} ?>><?php _e( 'Reply or Topic content', 'gd-bbpress-tools' ); ?></option>
                            <option value="both"<?php if ( $options["quote_location"] == "both" ) {
								echo ' selected="selected"';
							} ?>><?php _e( 'Both header and content', 'gd-bbpress-tools' ); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="quote_method"><?php _e( 'Quote Method', 'gd-bbpress-tools' ); ?></label></th>
                    <td>
                        <select id="quote_method" name="quote_method" class="regular-text">
                            <option value="bbcode"<?php if ( $options["quote_method"] == "bbcode" ) {
								echo ' selected="selected"';
							} ?>><?php _e( 'BBCode', 'gd-bbpress-tools' ); ?></option>
                            <option value="html"<?php if ( $options["quote_method"] == "html" ) {
								echo ' selected="selected"';
							} ?>><?php _e( 'HTML', 'gd-bbpress-tools' ); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="allowed_tags_div"><?php _e( 'Tags filtering', 'gd-bbpress-tools' ) ?></label></th>
                    <td>
                        <input type="checkbox" <?php if ( $options["allowed_tags_div"] == 1 ) {
							echo " checked";
						} ?> id="allowed_tags_div" name="allowed_tags_div"/>
						<?php _e( 'Enable DIV tag', 'gd-bbpress-tools' ); ?><br/>
                        <em><?php _e( 'Needed for quotes to work properly.', 'gd-bbpress-tools' ); ?></em>
                    </td>
                </tr>
                <tr class="line-on-top">
                    <th scope="row"><?php _e( 'Available to', 'gd-bbpress-tools' ) ?></th>
                    <td>
                        <label for="quote_super_admin">
                            <input type="checkbox" <?php if ( $options["quote_super_admin"] == 1 ) {
								echo " checked";
							} ?> name="quote_super_admin"/>
							<?php _e( 'Super Admin', 'gd-bbpress-tools' ); ?>
                        </label><br/>
						<?php foreach ( $_user_roles as $role => $title ) { ?>
                            <label for="quote_roles_<?php echo $role; ?>">
                                <input type="checkbox" <?php if ( ! isset( $options["quote_roles"] ) || in_array( $role, $options["quote_roles"] ) ) {
									echo " checked";
								} ?> value="<?php echo $role; ?>" id="quote_roles_<?php echo $role; ?>" name="quote_roles[]"/>
								<?php echo $title; ?>
                            </label><br/>
						<?php } ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e( 'Capability', 'gd-bbpress-tools' ) ?></th>
                    <td>
                        <strong>d4p_bbpt_quote</strong>
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <fieldset>
            <h3><?php _e( 'Toolbar Menu', 'gd-bbpress-tools' ); ?></h3>
            <p><?php _e( 'Add menu to the WordPress toolbar with quick access to both admin and front end side forum related pages.', 'gd-bbpress-tools' ); ?></p>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row"><label for="toolbar_active"><?php _e( 'Active', 'gd-bbpress-tools' ); ?></label></th>
                    <td>
                        <input type="checkbox" <?php if ( $options["toolbar_active"] == 1 ) {
							echo " checked";
						} ?> id="toolbar_active" name="toolbar_active"/>
                    </td>
                </tr>
                <tr class="line-on-top">
                    <th scope="row"><?php _e( 'Show menu to', 'gd-bbpress-tools' ) ?></th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text"><span><?php _e( 'Allow upload to', 'gd-bbpress-tools' ); ?></span></legend>
                            <label for="toolbar_super_admin">
                                <input type="checkbox" <?php if ( $options["toolbar_super_admin"] == 1 ) {
									echo " checked";
								} ?> name="toolbar_super_admin"/>
								<?php _e( 'Super Admin', 'gd-bbpress-tools' ); ?>
                            </label><br/>
							<?php foreach ( $_user_roles as $role => $title ) { ?>
                                <label for="toolbar_roles_<?php echo $role; ?>">
                                    <input type="checkbox" <?php if ( ! isset( $options["toolbar_roles"] ) || in_array( $role, $options["toolbar_roles"] ) ) {
										echo " checked";
									} ?> value="<?php echo $role; ?>" id="toolbar_roles_<?php echo $role; ?>" name="toolbar_roles[]"/>
									<?php echo $title; ?>
                                </label><br/>
							<?php } ?>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e( 'Capability', 'gd-bbpress-tools' ) ?></th>
                    <td>
                        <strong>d4p_bbpt_toolbar</strong>
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <fieldset>
            <h3><?php _e( 'User Signature', 'gd-bbpress-tools' ); ?></h3>
            <p><?php _e( 'Allow users to create signatures that will be included with their replies or topics. Control length and use of HTML or BBCodes.', 'gd-bbpress-tools' ); ?></p>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row"><label for="signature_active"><?php _e( 'Active', 'gd-bbpress-tools' ); ?></label></th>
                    <td>
                        <input type="checkbox" <?php if ( $options["signature_active"] == 1 ) {
							echo " checked";
						} ?> id="signature_active" name="signature_active"/>
                    </td>
                </tr>
                <tr class="line-on-top">
                    <th scope="row"><label for="signature_length"><?php _e( 'Maximum length', 'gd-bbpress-tools' ); ?></label></th>
                    <td>
                        <input type="text" class="small-text" value="<?php echo esc_attr( $options["signature_length"] ); ?>" id="signature_length" name="signature_length"/>
                        <span class="description"><?php _e( 'characters', 'gd-bbpress-tools' ); ?></span>
                    </td>
                </tr>
                <tr class="line-on-top">
                    <th scope="row"><?php _e( 'Allowed to', 'gd-bbpress-tools' ) ?></th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text"><span><?php _e( 'User Roles', 'gd-bbpress-tools' ); ?></span></legend>
                            <label for="signature_super_admin">
                                <input type="checkbox" <?php if ( $options["signature_super_admin"] == 1 ) {
									echo " checked";
								} ?> name="signature_super_admin"/>
								<?php _e( 'Super Admin', 'gd-bbpress-tools' ); ?>
                            </label><br/>
							<?php foreach ( $_user_roles as $role => $title ) { ?>
                                <label for="signature_roles_<?php echo $role; ?>">
                                    <input type="checkbox" <?php if ( ! isset( $options["signature_roles"] ) || in_array( $role, $options["signature_roles"] ) ) {
										echo " checked";
									} ?> value="<?php echo $role; ?>" id="signature_roles_<?php echo $role; ?>" name="signature_roles[]"/>
									<?php echo $title; ?>
                                </label><br/>
							<?php } ?>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e( 'Capability', 'gd-bbpress-tools' ) ?></th>
                    <td>
                        <strong>d4p_bbpt_signature</strong>
                    </td>
                </tr>
                </tbody>
            </table>

            <h3><?php _e( 'User Signature: HTML / BBCodes Enhanced', 'gd-bbpress-tools' ); ?></h3>
            <p><?php _e( 'Allow users to create rich signature with HTML or BBCodes.', 'gd-bbpress-tools' ); ?></p>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row"><label for="signature_method"><?php _e( 'Enhanced', 'gd-bbpress-tools' ); ?></label></th>
                    <td>
                        <select id="signature_method" name="signature_method" class="regular-text">
                            <option value="off"<?php if ( $options["signature_method"] == "off" ) {
								echo ' selected="selected"';
							} ?>><?php _e( 'Disabled', 'gd-bbpress-tools' ); ?></option>
                            <option value="bbcode"<?php if ( $options["signature_method"] == "bbcode" ) {
								echo ' selected="selected"';
							} ?>><?php _e( 'BBCode', 'gd-bbpress-tools' ); ?></option>
                            <option value="html"<?php if ( $options["signature_method"] == "html" ) {
								echo ' selected="selected"';
							} ?>><?php _e( 'HTML', 'gd-bbpress-tools' ); ?></option>
                            <option value="full"<?php if ( $options["signature_method"] == "full" ) {
								echo ' selected="selected"';
							} ?>><?php _e( 'BBCode And HTML', 'gd-bbpress-tools' ); ?></option>
                        </select>
                    </td>
                </tr>
                <tr class="line-on-top">
                    <th scope="row"><?php _e( 'Allowed to', 'gd-bbpress-tools' ) ?></th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text"><span><?php _e( 'User Roles', 'gd-bbpress-tools' ); ?></span></legend>
                            <label for="signature_enhanced_super_admin">
                                <input type="checkbox" <?php if ( $options["signature_enhanced_super_admin"] == 1 ) {
									echo " checked";
								} ?> name="signature_enhanced_super_admin"/>
								<?php _e( 'Super Admin', 'gd-bbpress-tools' ); ?>
                            </label><br/>
							<?php foreach ( $_user_roles as $role => $title ) { ?>
                                <label for="signature_enhanced_roles_<?php echo $role; ?>">
                                    <input type="checkbox" <?php if ( ! isset( $options["signature_enhanced_roles"] ) || in_array( $role, $options["signature_enhanced_roles"] ) ) {
										echo " checked";
									} ?> value="<?php echo $role; ?>" id="signature_enhanced_roles_<?php echo $role; ?>" name="signature_enhanced_roles[]"/>
									<?php echo $title; ?>
                                </label><br/>
							<?php } ?>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e( 'Capability', 'gd-bbpress-tools' ) ?></th>
                    <td>
                        <strong>d4p_bbpt_signature_enhanced</strong>
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <fieldset>
            <h3><?php _e( 'User Signature: BuddyPress Profile Field Group', 'gd-bbpress-tools' ); ?></h3>
            <p><?php _e( 'Select group where the signature editor will be displayed.', 'gd-bbpress-tools' ); ?></p>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row"><label for="signature_buddypress_profile_group"><?php _e( 'Field Group', 'gd-bbpress-tools' ); ?></label></th>
                    <td>
						<?php

						$groups = array();
						if ( class_exists( 'BP_XProfile_Group' ) ) {
							$raw = BP_XProfile_Group::get( array( 'fetch_fields' => false ) );

							foreach ( $raw as $group ) {
								$groups[ $group->id ] = $group->name;
							}
						} else {
							$groups = array( '1' => __( 'Base', 'gd-bbpress-tools' ) );
						}

						?>
                        <select id="signature_buddypress_profile_group" name="signature_buddypress_profile_group" class="regular-text">
							<?php

							foreach ( $groups as $key => $name ) {
								$selected = $options['signature_buddypress_profile_group'] == $key ? ' selected="selected"' : '';
								echo '<option value="' . $key . '"' . $selected . '>' . $name . '</option>';
							}

							?>
                        </select>
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <fieldset>
            <h3><?php _e( 'Limit bbPress access on admin side', 'gd-bbpress-tools' ); ?></h3>
            <p><?php _e( 'Select who can see and access admin side bbPress forums, topics and reply controls. Be careful with this feature.', 'gd-bbpress-tools' ); ?></p>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row"><label for="admin_disable_active"><?php _e( 'Active', 'gd-bbpress-tools' ); ?></label></th>
                    <td>
                        <input type="checkbox" <?php if ( $options["admin_disable_active"] == 1 ) {
							echo " checked";
						} ?> id="admin_disable_active" name="admin_disable_active"/>
                    </td>
                </tr>
                <tr class="line-on-top">
                    <th scope="row"><?php _e( 'Roles with access', 'gd-bbpress-tools' ) ?></th>
                    <td>
                        <fieldset>
                            <legend class="screen-reader-text"><span><?php _e( 'User Roles', 'gd-bbpress-tools' ); ?></span></legend>
                            <label for="admin_disable_super_admin">
                                <input type="checkbox" <?php if ( $options["admin_disable_super_admin"] == 1 ) {
									echo " checked";
								} ?> name="admin_disable_super_admin"/>
								<?php _e( 'Super Admin', 'gd-bbpress-tools' ); ?>
                            </label><br/>
							<?php foreach ( $_user_roles as $role => $title ) { ?>
                                <label for="admin_disable_roles_<?php echo $role; ?>">
                                    <input type="checkbox" <?php if ( ! isset( $options["admin_disable_roles"] ) || in_array( $role, $options["admin_disable_roles"] ) ) {
										echo " checked";
									} ?> value="<?php echo $role; ?>" id="admin_disable_roles_<?php echo $role; ?>" name="admin_disable_roles[]"/>
									<?php echo $title; ?>
                                </label><br/>
							<?php } ?>
                        </fieldset>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?php _e( 'Capability', 'gd-bbpress-tools' ) ?></th>
                    <td>
                        <strong>d4p_bbpt_admin_disable</strong>
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <fieldset>
            <h3><?php _e( 'JavaScript and CSS Settings', 'gd-bbpress-tools' ); ?></h3>
            <p><?php _e( 'If you use shortcodes to embed forums, and you rely on plugin to add JS and CSS, you also need to enable this option to skip checking for bbPress specific pages.', 'gd-bbpress-tools' ); ?></p>
            <p><?php _e( 'Plugin will attempt to load files automatically when needed. If that fails, try using this option.', 'gd-bbpress-tools' ); ?></p>
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row"><label for="include_always"><?php _e( 'Always Include', 'gd-bbpress-tools' ); ?></label></th>
                    <td>
                        <input type="checkbox" <?php if ( $options["include_always"] == 1 ) {
							echo " checked";
						} ?> id="include_always" name="include_always"/>
                    </td>
                </tr>
                </tbody>
            </table>
        </fieldset>

        <p class="submit">
            <input type="submit" value="<?php _e( 'Save Changes', 'gd-bbpress-tools' ); ?>" class="button-primary gdbb-tools-submit" id="gdbb-tools-submit" name="gdbb-tools-submit"/>
        </p>
    </div>
    <div class="d4p-settings-second">
		<?php include( GDBBPRESSTOOLS_PATH . 'forms/more/toolbox.php' ); ?>
    </div>

    <div class="d4p-clear"></div>
</form>
