<?php
    vc_map( array(
        "name" => __("Posts Grid", 'viser-addons-for-visual-composer'),
        "description" => __("Display awesome Blog posts with grid style", 'viser-addons-for-visual-composer'),
        "base" => "banner",
        "class" => "",
        "controls" => "full",
        "icon" => plugins_url('../assets/images/viser-addons.jpg', __FILE__), // or css class name which you can reffer in your css file later. Example: "viser-addons-for-visual-composer_my_class"
        "category" => __('VISER Addons', 'viser-addons-for-visual-composer'),
        "params" => array(
           

            
            
        )

    ) );


function viser_posts_grid( $atts, $content = null ) {
    extract( shortcode_atts( array(
        ''=>'',
    ), $atts ) );
    ob_start();
    ?>

    <?php
    return ob_get_clean();
}
add_shortcode( 'postsgrid', 'viser_posts_grid'  );
    