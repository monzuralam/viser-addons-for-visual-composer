<?php
    vc_map( array(
        "name" => __("Posts Grid", 'viser-addons-for-visual-composer'),
        "description" => __("Display awesome Blog posts with grid style", 'viser-addons-for-visual-composer'),
        "base" => "postsgrid",
        "class" => "",
        "controls" => "full",
        "icon" => plugins_url('../assets/images/viser-addons.jpg', __FILE__), // or css class name which you can reffer in your css file later. Example: "viser-addons-for-visual-composer_my_class"
        "category" => __('VISER Addons', 'viser-addons-for-visual-composer'),
        "params" => array(
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Number of Posts", 'viser-addons-for-visual-composer'),
                "param_name" => "posts_grid_number",
                "group" 		=> 'General',
                "description" => __("Enter number of blog post to show.", 'viser-addons-for-visual-composer')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Number of Column","viser-addons-for-visual-composer"),
                "param_name" => "posts_grid_column",
                "value" => array(
                    __("Default","viser-addons-for-visual-composer") => "vc_col-md-4",
                    __("2 Columns","viser-addons-for-visual-composer") => "vc_col-md-6",
                    __("3 Columns","viser-addons-for-visual-composer") => "vc_col-md-4",
                    __("4 Columns","viser-addons-for-visual-composer") => "vc_col-md-3",
                    __("6 Columns","viser-addons-for-visual-composer") => "vc_col-md-2",
                ),
                "group" 		=> 'General',
                "description" => __("Default 3 Columns", "viser-addons-for-visual-composer"),
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Title Tag","viser-addons-for-visual-composer"),
                "param_name" => "posts_grid_title_tag",
                "value" => array(
                    __("Default","viser-addons-for-visual-composer") => "h3",
                    __("H1","viser-addons-for-visual-composer") => "h1",
                    __("H2","viser-addons-for-visual-composer") => "h2",
                    __("H4","viser-addons-for-visual-composer") => "h4",
                    __("H5","viser-addons-for-visual-composer") => "h5",
                    __("H6","viser-addons-for-visual-composer") => "h6",
                    __("Div","viser-addons-for-visual-composer") => "div",
                    __("p","viser-addons-for-visual-composer") => "p",
                    __("span","viser-addons-for-visual-composer") => "span",
                ),
                "group" 		=> 'General',
                "description" => __("Default is H3", "viser-addons-for-visual-composer"),
            ),

            
            
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
    