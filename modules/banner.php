<?php
    vc_map( array(
        "name" => __("Interactive Banner", 'viser-addons-for-visual-composer'),
        "description" => __("Display Banner image with information", 'viser-addons-for-visual-composer'),
        "base" => "banner",
        "class" => "",
        "controls" => "full",
        "icon" => plugins_url('../assets/images/viser-addons.jpg', __FILE__), // or css class name which you can reffer in your css file later. Example: "viser-addons-for-visual-composer_my_class"
        "category" => __('VISER Addons', 'viser-addons-for-visual-composer'),
        "params" => array(
            array(
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => __("Title", 'viser-addons-for-visual-composer'),
              "param_name" => "banner_title",
              "group" 		=> 'General',
              "description" => __("Give a title to this banner", 'viser-addons-for-visual-composer')
            ),
            array(
                "type" => "dropdown",
                "heading" => __("Title Tag","viser-addons-for-visual-composer"),
                "param_name" => "banner_title_tag",
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
            array(
                "type" => "textarea",
                "holder" => "div",
                "class" => "",
                "heading" => __("Description", 'viser-addons-for-visual-composer'),
                "param_name" => "banner_description",
                "group" 		=> 'General',
                "description" => __("Give a description", 'viser-addons-for-visual-composer')
            ),
            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => __("Button Title", 'viser-addons-for-visual-composer'),
                "param_name" => "banner_btn_text",
                "group" 		=> 'General',
                "description" => __("", 'viser-addons-for-visual-composer')
            ),
            array(
                "type" => "vc_link",
                "holder" => "div",
                "class" => "",
                "heading" => __("Button URL", 'viser-addons-for-visual-composer'),
                "param_name" => "banner_btn_url",
                "group" 		=> 'General',
                "description" => __("", 'viser-addons-for-visual-composer')
            ),
            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "",
                "heading" => __("Image", 'viser-addons-for-visual-composer'),
                "param_name" => "banner_img",
                "group" 		=> 'General',
                "description" => __("", 'viser-addons-for-visual-composer')
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Title Text Color","viser-addons-for-visual-composer"),
                "param_name" => "banner_title_color",
                "value" => "#ffffff",
                "group" 		=> 'Color',
                "description" => __("Select the color for banner title text color","viser-addons-for-visual-composer"),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Description Color","viser-addons-for-visual-composer"),
                "param_name" => "banner_desc_color",
                "value" => "#ffffff",
                "group" 		=> 'Color',
                "description" => __("Select the color for banner description color","viser-addons-for-visual-composer"),
            ),
            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => __("Button Text Color","viser-addons-for-visual-composer"),
                "param_name" => "banner_btn_color",
                "value" => "#ffffff",
                "group" 		=> 'Color',
                "description" => __("Select the color for banner button text color","viser-addons-for-visual-composer"),
            ),
        )

    ) );


    function viser_interactive_banner( $atts, $content = null ) {
      extract( shortcode_atts( array(
        'banner_title'=>'Lorem ipsum doller sit',
        'banner_title_tag'=>'h3',
        'banner_description'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, debitis?',
        'banner_btn_text'=>'Learn More',
        'banner_btn_url'=>'#',
        'banner_img'=> plugins_url('../assets/images/placeholder-banner.jpg', __FILE__),
        'banner_title_color'=>'#fff',
        'banner_desc_color'=>'#fff',
        'banner_btn_color'=>'#fff',
      ), $atts ) );
      ob_start();
      $img = wp_get_attachment_image_src($banner_img,'full')[0];
      ?>
      <div class="banner-area clearfix">
        <div class="banner-image">
            <?php
                if(isset($img)){
            ?>
                <img src="<?php echo $img; ?>" alt="image" class="img-fluid">
            <?php }else{?>
                <img src="<?php echo $banner_img; ?>" alt="image" class="img-fluid">
            <?php
                }
            ?>
        </div>
        <div class="banner-content">
            <h3 class="banner-title" style="color:<?php echo $banner_title_color; ?>">
                <strong class="d-block mb-1"><?php echo $banner_title; ?></strong> 
            </h3>
            <p class="banner-description" style="color:<?php echo $banner_desc_color; ?>">
                <span class="d-block"><?php echo $banner_description; ?></span> 
            </p>
            <a href="<?php echo $banner_btn_url; ?>" class="banner-btn" style="color:<?php echo $banner_btn_color; ?>"><?php echo $banner_btn_text; ?></a>
        </div>
    </div>
      <?php
      return ob_get_clean();
    }
    add_shortcode( 'banner', 'viser_interactive_banner'  );
    