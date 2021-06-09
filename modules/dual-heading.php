<?php
    vc_map( array(
        "name" => __("Dual Heading", 'viser-addons-for-visual-composer'),
        "description" => __("Display Dual Heading with text", 'viser-addons-for-visual-composer'),
        "base" => "dualheading",
        "class" => "",
        "controls" => "full",
        "icon" => plugins_url('../assets/images/viser-addons.jpg', __FILE__), // or css class name which you can reffer in your css file later. Example: "viser-addons-for-visual-composer_my_class"
        "category" => __('VISER Addons', 'viser-addons-for-visual-composer'),
        "params" => array(
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("First Heading", 'viser-addons-for-visual-composer'),
              "param_name" => "dual_first_heading",
              "group" 		=> 'General',
              "description" => __("Give a title to for first heading", 'viser-addons-for-visual-composer')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Second Heading", 'viser-addons-for-visual-composer'),
                "param_name" => "dual_second_heading",
                "group" 		=> 'General',
                "description" => __("Give a title to for Second heading", 'viser-addons-for-visual-composer')
              ),
            array(
                "type" => "dropdown",
                "heading" => __("Heading Tag","viser-addons-for-visual-composer"),
                "param_name" => "dual_heading_tag",
                "value" => array(
                    __("Default","viser-addons-for-visual-composer") => "h2",
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
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => __("Sub Heading", 'viser-addons-for-visual-composer'),
                "param_name" => "dual_sub_heading",
                "group" 		=> 'General',
                "description" => __("Sub heading description", 'viser-addons-for-visual-composer')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Alignment","viser-addons-for-visual-composer"),
                "param_name" => "dual_heading_align",
                "value" => array(
                    __("Default","viser-addons-for-visual-composer") => "center",
                    __("Left","viser-addons-for-visual-composer") => "left",
                    __("Center","viser-addons-for-visual-composer") => "center",
                    __("Right","viser-addons-for-visual-composer") => "right",
                ),
                "group" 		=> 'General',
                "description" => __("Default is H3", "viser-addons-for-visual-composer"),
            ),

            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("First Heading Color","viser-addons-for-visual-composer"),
                "param_name" => "first_heading_color",
                "value" => "#ffffff",
                "group" 		=> 'Color',
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Second Heading Color","viser-addons-for-visual-composer"),
                "param_name" => "second_heading_color",
                "value" => "#ffffff",
                "group" 		=> 'Color',
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Sub Heading Color","viser-addons-for-visual-composer"),
                "param_name" => "sub_heading_color",
                "value" => "#ffffff",
                "group" => 'Color',
            ),
        )

    ) );


    function viser_dual_heading( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'dual_first_heading'=>'Lorem',
        'dual_second_heading'=>'Ipsum Doller',
        'dual_heading_tag'=>'h2',
        'dual_sub_heading'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab incidunt ipsum illo iure et aut cumque dolorum est numquam commodi.',
        'dual_heading_align'=>'center',
        'first_heading_color'=>'#CD2653',
        'second_heading_color'=>'#000',
        'sub_heading_color'=>'',
      ), $atts ) );
      ob_start();
      ?>
        <div class="dual-heading clearfix">
            <<?php echo $dual_heading_tag; ?> class="heading-title"><span style="color:<?php echo $first_heading_color; ?>"><?php echo $dual_first_heading; ?></span> <?php echo $dual_second_heading; ?></<?php echo $dual_heading_tag; ?>>
            <div class="heading-shorttext">
                <p><?php echo $dual_sub_heading; ?></p>
            </div>
        </div>
      <?php
      return ob_get_clean();
    }
    add_shortcode( 'dualheading', 'viser_dual_heading'  );
    