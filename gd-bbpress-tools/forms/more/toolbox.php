<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$upgrade_url = function_exists( 'gdbbx_fs' ) ? gdbbx_fs()->get_upgrade_url() : 'https://www.dev4press.com/plugins/gd-bbpress-toolbox/pricing/';

?>

<div class="d4p-bbpress-toolbox">
    <fieldset class="the-top">
        <em><?php esc_html_e( 'consider upgrading to', 'gd-bbpress-tools' ); ?></em>
        <h3 style="line-height: 1.5">
            <a title="forumToolbox for bbPress" target="_blank" href="<?php echo esc_url( d4p_url_campaign_tracking( 'https://www.dev4press.com/plugins/gd-bbpress-toolbox/', 'gd-bbpress-attachments-to-pro', 'wordpress', 'free-plugin-admin' ) ); ?>">forumToolbox Pro for bbPress</a>
        </h3>

        <em>AKA: GD bbPress Toolbox Pro</em>
        <p style="font-weight: bold; font-size: 15px;"><?php esc_html_e( 'Enhancing WordPress forums powered by bbPress', 'gd-bbpress-tools' ); ?></p>
    </fieldset>

    <a href="<?php echo esc_url( $upgrade_url ); ?>" class="button-primary" style=" margin: 20px 0 0; text-align: center; font-weight: bold; width: 100%; line-height: 3.5; font-size: 1.4em; border-radius: 5px"><?php esc_html_e( 'Upgrade Now', 'gd-bbpress-tools' ); ?></a>

    <fieldset>
        <p style="font-weight: bold;"><?php esc_html_e( 'Some of the features you will get with forumToolbox for bbPress', 'gd-bbpress-tools' ); ?></p>
        <ul>
            <li><?php esc_html_e( 'Enhanced attachments', 'gd-bbpress-tools' ); ?></li>
            <li><?php esc_html_e( 'Report Topics and Replies', 'gd-bbpress-tools' ); ?></li>
            <li><?php esc_html_e( 'Canned Replies', 'gd-bbpress-tools' ); ?></li>
            <li><?php esc_html_e( 'Say Thanks to forum members', 'gd-bbpress-tools' ); ?></li>
            <li><?php esc_html_e( 'Various privacy tools', 'gd-bbpress-tools' ); ?></li>
            <li><?php esc_html_e( 'Various SEO tools', 'gd-bbpress-tools' ); ?></li>
            <li><?php esc_html_e( 'New and unread topics tracking', 'gd-bbpress-tools' ); ?></li>
            <li><?php esc_html_e( '45 BBCodes and BBCodes Toolbar', 'gd-bbpress-tools' ); ?></li>
            <li><?php esc_html_e( '19 Topics views', 'gd-bbpress-tools' ); ?></li>
            <li><?php esc_html_e( '8 Widgets', 'gd-bbpress-tools' ); ?></li>
            <li><?php esc_html_e( 'and much more...', 'gd-bbpress-tools' ); ?></li>
        </ul>
    </fieldset>

    <fieldset>
        <h3><?php esc_html_e( 'Special upgrade discount', 'gd-bbpress-tools' ); ?></h3>
        <p><?php esc_html_e( 'Buy forumToolbox Pro for bbPress license or bbPress Plugins Club Membership license and get 10% discount using this coupon', 'gd-bbpress-tools' ); ?>:<br/>
            <strong style="color: #c00; font-size: 20px;">BBFREETOPRO</strong></p>
    </fieldset>

    <fieldset>
        <h3><?php esc_html_e( 'More Information', 'gd-bbpress-tools' ); ?></h3>
        <p>
            <a href="<?php echo esc_url( d4p_url_campaign_tracking( 'https://www.dev4press.com/plugins/gd-bbpress-toolbox/', 'gd-bbpress-attachments-to-pro', 'wordpress', 'free-plugin-admin' ) ); ?>" target="_blank"><?php esc_html_e( 'Official Plugin Website', 'gd-bbpress-tools' ); ?></a><br/>
            <a href="<?php echo esc_url( d4p_url_campaign_tracking( 'https://www.dev4press.com/bbpress-club/', 'gd-bbpress-attachments-to-pro', 'wordpress', 'free-plugin-admin' ) ); ?>" target="_blank"><?php esc_html_e( 'bbPress Plugins Club Membership', 'gd-bbpress-tools' ); ?></a><br/>
        </p>
    </fieldset>
</div>