<?php
    vc_map( array(
        "name" => __("Dual Button", 'viser-addons-for-visual-composer'),
        "description" => __("Display Dual Button with Link", 'viser-addons-for-visual-composer'),
        "base" => "dualbutton",
        "class" => "",
        "controls" => "full",
        "icon" => plugins_url('../assets/images/viser-addons.jpg', __FILE__), // or css class name which you can reffer in your css file later. Example: "viser-addons-for-visual-composer_my_class"
        "category" => __('VISER Addons', 'viser-addons-for-visual-composer'),
        "params" => array(
            array(
                "type" => "dropdown",
                "heading" => __("Alignment","viser-addons-for-visual-composer"),
                "param_name" => "dual_btn_align",
                "value" => array(
                    __("Default","viser-addons-for-visual-composer") => "center",
                    __("Left","viser-addons-for-visual-composer") => "left",
                    __("Center","viser-addons-for-visual-composer") => "center",
                    __("Right","viser-addons-for-visual-composer") => "right",
                ),
                "group" 		=> 'General',
                "description" => __("Default Button Alignment Center", "viser-addons-for-visual-composer"),
            ),
  
              
        )

    ) );


    function viser_dual_button( $atts, $content = null ) {
      extract( shortcode_atts( array(
        ''=>'',
      ), $atts ) );
      ob_start();
      ?>

      <?php
      return ob_get_clean();
    }
    add_shortcode( 'dualbutton', 'viser_dual_button' );
    