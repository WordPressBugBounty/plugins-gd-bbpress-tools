<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<div class="d4p-information">
    <fieldset>
        <h3>GD bbPress Tools <?php echo esc_html( $options["version"] ); ?></h3>
        <?php

        $status = ucfirst( $options["status"] );
        if ( $options["revision"] > 0 ) {
            $status .= " #" . $options["revision"];
        }

        esc_html_e( 'Release Date: ', 'gd-bbpress-tools' );
        echo '<strong>' . esc_html( $options["date"] ) . '</strong><br/>';
        esc_html_e( 'Status: ', 'gd-bbpress-tools' );
        echo '<strong>' . esc_html( $status ) . '</strong><br/>';
        esc_html_e( 'Build: ', 'gd-bbpress-tools' );
        echo '<strong>' . esc_html( $options["build"] ) . '</strong>';

        ?>
    </fieldset>

    <fieldset>
        <h3><?php esc_html_e( 'System Requirements', 'gd-bbpress-tools' ); ?></h3>
        <?php

        esc_html_e( 'PHP: ', 'gd-bbpress-tools' );
        echo '<strong>8.0 or newer</strong><br/>';
        esc_html_e( 'WordPress: ', 'gd-bbpress-tools' );
        echo '<strong>6.2 or newer</strong><br/>';
        esc_html_e( 'bbPress: ', 'gd-bbpress-tools' );
        echo '<strong>2.6.2 or newer</strong>';

        ?>
    </fieldset>

    <fieldset>
        <h3><?php esc_html_e( 'Important Plugin Links', 'gd-bbpress-tools' ); ?></h3>
        <a target="_blank" href="https://www.dev4press.com/plugins/gd-bbpress-tools/">GD bbPress Tools <?php esc_html_e( 'Home Page', 'gd-bbpress-tools' ); ?></a><br/>
        <a target="_blank" href="https://wordpress.org/extend/plugins/gd-bbpress-tools/">GD bbPress Tools <?php esc_html_e( 'on', 'gd-bbpress-tools' ); ?> WordPress.org</a>
        <h3><?php esc_html_e( 'Plugin Support', 'gd-bbpress-tools' ); ?></h3>
        <a target="_blank" href="https://support.dev4press.com/forums/forum/plugins-free/gd-bbpress-tools/"><?php esc_html_e( 'Plugin Support Forum on Dev4Press', 'gd-bbpress-tools' ); ?></a><br/>
        <h3><?php esc_html_e( 'Dev4Press Important Links', 'gd-bbpress-tools' ); ?></h3>
        <a target="_blank" href="https://twitter.com/dev4press">Dev4Press <?php esc_html_e( 'on', 'gd-bbpress-tools' ); ?> Twitter</a><br/>
        <a target="_blank" href="https://www.facebook.com/dev4press">Dev4Press Facebook <?php esc_html_e( 'Page', 'gd-bbpress-tools' ); ?></a>
    </fieldset>
</div>
<div class="d4p-information-second">
    <?php include( GDBBPRESSTOOLS_PATH . 'forms/more/toolbox.php' ); ?>
</div>
<div class="d4p-clear"></div>
<div class="d4p-copyright">
    Dev4Press &copy; 2008 - 2026
    <a target="_blank" href="https://www.dev4press.com/">www.dev4press.com</a>
</div>
