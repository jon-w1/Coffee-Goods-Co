<?php
/*Fancybox*/
if(class_exists('WPBakeryVisualComposerAbstract')){
	add_action( 'init', 'cms_integrateWithVC' );
}

if(!function_exists('cms_integrateWithVC')){
    function cms_integrateWithVC(){
        vc_map(
			array(
				"name" => esc_html__("ZK Single Fancy Box", 'zk-monaco' ),
			    "base" => "cms_fancybox_single",
			    "class" => "vc-cms-fancy-boxes",
			    "category" => esc_html__("Zooka Shortcodes", 'zk-monaco' ),
			    "params" => array(
			    	
			    	array(
			            "type" => "textfield",
			            "heading" => esc_html__("Title", 'zk-monaco' ),
			            "param_name" => "title",
			            "description" => esc_html__("Title Of Element", 'zk-monaco' ),
			            "group" => esc_html__("General Settings", 'zk-monaco' )
			        ),
			        array(
						"type" => "textfield",
			            "heading" => esc_html__("Sub Title", 'zk-monaco' ),
			            "param_name" => "element_sub_title",
			            "description" => esc_html__("Sub title of Element", 'zk-monaco' ),
			            "group" => esc_html__("General Settings", 'zk-monaco' )
					),
			        array(
			            "type" => "textarea",
			            "heading" => esc_html__("Description", 'zk-monaco' ),
			            "param_name" => "description",
			            "description" => esc_html__("Description Of Element", 'zk-monaco' ),
			            "group" => esc_html__("General Settings", 'zk-monaco' )
			        ),
			        array(
			            "type" => "dropdown",
			            "heading" => esc_html__("Content Align", 'zk-monaco' ),
			            "param_name" => "content_align",
			            "value" => array(
			            	"Default" => "default",
			            	"Left" => "left",
			            	"Right" => "right",
			            	"Center" => "center"
			            	),
			            'std'	=> 'default',
			            "group" => esc_html__("General Settings", 'zk-monaco' )
			        ),
			        /* Start Items */
			        /* Start Icon */
			        array(
						'type' => 'dropdown',
						'param_name' => 'icon_type',
						'heading' => esc_html__( 'Icon library', 'zk-monaco' ),
						'value' => array(
							esc_html__( 'Font Awesome', 'zk-monaco' ) => 'fontawesome',
							esc_html__( 'Open Iconic', 'zk-monaco' ) => 'openiconic',
							esc_html__( 'Typicons', 'zk-monaco' ) => 'typicons',
							esc_html__( 'Entypo', 'zk-monaco' ) => 'entypo',
							esc_html__( 'Linecons', 'zk-monaco' ) => 'linecons',
							esc_html__( 'Pixel', 'zk-monaco' ) => 'pixelicons',
							esc_html__( 'P7 Stroke', 'zk-monaco' ) => 'pe7stroke',			
						),
						'std' => 'fontawesome',
						'description' => esc_html__( 'Select icon library.', 'zk-monaco' ),
						"group" => esc_html__("Fancy Icon Settings", 'zk-monaco' )
					),
					array(
						'type' => 'iconpicker',
						'heading' => esc_html__( 'Icon Item', 'zk-monaco' ),
						'param_name' => 'icon_fontawesome',
			            'value' => '',
						'settings' => array(
							'emptyIcon' => true, // default true, display an "EMPTY" icon?
							'type' => 'fontawesome',
							'iconsPerPage' => 200, // default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'fontawesome',
						),
						'description' => esc_html__( 'Select icon from library.', 'zk-monaco' ),
						"group" => esc_html__("Fancy Icon Settings", 'zk-monaco' )
					),
			        array(
						'type' => 'iconpicker',
						'heading' => esc_html__( 'Icon Item', 'zk-monaco' ),
						'param_name' => 'icon_openiconic',
			            'value' => '',
						'settings' => array(
							'emptyIcon' => true, // default true, display an "EMPTY" icon?
							'type' => 'openiconic',
							'iconsPerPage' => 200, // default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'openiconic',
						),
						'description' => esc_html__( 'Select icon from library.', 'zk-monaco' ),
						"group" => esc_html__("Fancy Icon Settings", 'zk-monaco' )
					),
					array(
						'type' => 'iconpicker',
						'heading' => esc_html__( 'Icon Item', 'zk-monaco' ),
						'param_name' => 'icon_typicons',
			            'value' => '',
						'settings' => array(
							'emptyIcon' => true, // default true, display an "EMPTY" icon?
							'type' => 'typicons',
							'iconsPerPage' => 200, // default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'typicons',
						),
						'description' => esc_html__( 'Select icon from library.', 'zk-monaco' ),
						"group" => esc_html__("Fancy Icon Settings", 'zk-monaco' )
					),
					array(
						'type' => 'iconpicker',
						'heading' => esc_html__( 'Icon Item', 'zk-monaco' ),
						'param_name' => 'icon_entypo',
			            'value' => '',
						'settings' => array(
							'emptyIcon' => true, // default true, display an "EMPTY" icon?
							'type' => 'entypo',
							'iconsPerPage' => 200, // default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'entypo',
						),
						'description' => esc_html__( 'Select icon from library.', 'zk-monaco' ),
						"group" => esc_html__("Fancy Icon Settings", 'zk-monaco' )
					),
					array(
						'type' => 'iconpicker',
						'heading' => esc_html__( 'Icon Item', 'zk-monaco' ),
						'param_name' => 'icon_linecons',
			            'value' => '',
						'settings' => array(
							'emptyIcon' => true, // default true, display an "EMPTY" icon?
							'type' => 'linecons',
							'iconsPerPage' => 200, // default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'linecons',
						),
						'description' => esc_html__( 'Select icon from library.', 'zk-monaco' ),
						"group" => esc_html__("Fancy Icon Settings", 'zk-monaco' )
					),
					array(
						'type' => 'iconpicker',
						'heading' => esc_html__( 'Icon Item', 'zk-monaco' ),
						'param_name' => 'icon_pixelicons',
			            'value' => '',
						'settings' => array(
							'emptyIcon' => true, // default true, display an "EMPTY" icon?
							'type' => 'pixelicons',
							'iconsPerPage' => 200, // default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'pixelicons',
						),
						'description' => esc_html__( 'Select icon from library.', 'zk-monaco' ),
						"group" => esc_html__("Fancy Icon Settings", 'zk-monaco' )
					),
					array(
						'type' => 'iconpicker',
						'heading' => esc_html__( 'Icon Item', 'zk-monaco' ),
						'param_name' => 'icon_pe7stroke',
						'settings' => array(
							'emptyIcon' => true, // default true, display an "EMPTY" icon?
							'type' => 'pe7stroke',
							'iconsPerPage' => 200, // default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'icon_type',
							'value' => 'pe7stroke',
						),
						'description' => esc_html__( 'Select icon from library.', 'zk-monaco' ),
						"group" => esc_html__("Fancy Icon Settings", 'zk-monaco' )
					),
					/* End Icon */
					array(
			            "type" => "attach_image",
			            "heading" => esc_html__("Image Item", 'zk-monaco' ),
			            "param_name" => "image",
			            "group" => esc_html__("Fancy Icon Settings", 'zk-monaco' )
			        ),
			        array(
			            "type" => "textfield",
			            "heading" => esc_html__("Title Item", 'zk-monaco' ),
			            "param_name" => "title_item",
			            "description" => esc_html__("Title Of Item", 'zk-monaco' ),
			            "group" => esc_html__("Fancy Icon Settings", 'zk-monaco' ),
			            "holder" => "div"
			        ),
			        array(
			            "type" => "textfield",
			            "heading" => esc_html__("Sub Title", 'zk-monaco' ),
			            "param_name" => "sub_title_item",
			            "description" => esc_html__("Sub Title Of Item", 'zk-monaco' ),
			            "group" => esc_html__("Fancy Icon Settings", 'zk-monaco' ),
			        ),
			        array(
			            "type" => "textarea",
			            "heading" => esc_html__("Content Item", 'zk-monaco' ),
			            "param_name" => "description_item",
			            "group" => esc_html__("Fancy Icon Settings", 'zk-monaco' )
			        ),
			        /* End Items */
			        array(
			            "type" => "dropdown",
			            "heading" => esc_html__("Button Type", 'zk-monaco' ),
			            "param_name" => "button_type",
			            "value" => array(
			            	"Button" => "button",
			            	"Text" => "text"
			            	),
			            'std'	=> 'button',
			            "group" => esc_html__("Buttons Settings", 'zk-monaco' )
			        ),
			        array(
			            "type" => "vc_link",
			            "heading" => esc_html__("Link", 'zk-monaco' ),
			            "param_name" => "button_link",
			            'description' => '',
			            "group" => esc_html__("Buttons Settings", 'zk-monaco' )
			        ),
			        array(
			            "type" => "textfield",
			            "heading" => esc_html__("Extra Class", 'zk-monaco' ),
			            "param_name" => "class",
			            'description' => '',
			            "group" => esc_html__("Template", 'zk-monaco' )
			        ),
			    	array(
			            "type" => "cms_template",
			            "param_name" => "cms_template",
			            'std'	=> 'cms_fancybox_single.php',
			            "admin_label" => true,
			            "heading" => esc_html__("Shortcode Template", 'zk-monaco' ),
			            "shortcode" => "cms_fancybox_single",
			            "group" => esc_html__("Template", 'zk-monaco' ),
			        ),
			        array(
			            "type" => "dropdown",
			            "heading" => esc_html__("Icon/Image Align", 'zk-monaco' ),
			            "param_name" => "image_align",
			            "value" => array(
			            	'Default' => '',
			            	'Left' => 'pull-left',
			            	'Right' => 'pull-right',
			            	'Center' => 'pull-center' 
			            ),
			            'std'	=> '',
			            "group" => "Template",
			            "class"  => "cms-extra-param",
			            "dependency" => array(
			            	'element' => 'cms_template',
			            	'value' => array(
			            		'cms_fancybox_single.php',
			            		'cms_fancybox_single--about.php',
			            		'cms_fancybox_single--overlay.php',
			            		'cms_fancybox_single--shopprocess.php',
			            		'cms_fancybox_single--onepage.php'
			            	)
			            ),
			        ),
				)
			)
		);
    }
}
