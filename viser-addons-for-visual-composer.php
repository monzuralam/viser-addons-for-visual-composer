<?php
/*
Plugin Name: VISER Addons for WPBakery Page Builder
Plugin URI: http://viserx.com
Description: VISER Addons is a powerfull widgets that works seamlessly with WPBakery Page Builder. It's extremely powerful for any theme.
Version: 0.0.1
Author: Monzur Alam
Author URI: https://profiles.wordpress.org/monzuralam
text-domain: viser-addons-for-visual-composer
License: GPLv2 or later
*/

// don't load directly
if (!defined('ABSPATH')) die('-1');

class VCExtendVISERAddons {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Register CSS and JS
        add_action( 'wp_enqueue_scripts', array( $this, 'loadCssAndJs' ) );
    }
 
    public function integrateWithVC() {
        // Check if WPBakery Page Builder is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Extend WPBakery Page Builder is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }
 
        /*
        Add your WPBakery Page Builder logic here.
        Lets call vc_map function to "register" our custom shortcode within WPBakery Page Builder interface.

        More info: http://kb.wpbakery.com/index.php?title=Vc_map
        */

        require_once('modules/banner.php');
        require_once('modules/dual-heading.php');
        require_once('modules/dual-button.php');
        require_once('modules/posts-grid.php');
        
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function loadCssAndJs() {
      wp_register_style( 'viser-style', plugins_url('assets/css/viser-addons.css', __FILE__) );
      wp_enqueue_style( 'viser-style' );

      // If you need any javascript files on front end, here is how you can load them.
      //wp_enqueue_script( 'viser-script', plugins_url('assets/js/viser-addons.js', __FILE__), array('jquery') );
    }

    /*
    Show notice if your plugin is activated but Visual Composer is not
    */
    public function showVcVersionNotice() {
        $plugin_data = get_plugin_data(__FILE__);
        echo '
        <div class="updated">
          <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'niva_addons'), $plugin_data['Name']).'</p>
        </div>';
    }
}
// Finally initialize code
new VCExtendVISERAddons();