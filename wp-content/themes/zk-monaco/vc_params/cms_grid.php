<?php 
      vc_add_param( 'cms_grid', array(
            "type" => "dropdown",
            "heading" => esc_html__("Title Layout", 'zk-monaco' ),
            "param_name" => "element_title_layout",
            "value" => array(
                  'Layout 1' => '1',
                  'Layout 2' => '2',
                  'Layout 3' => '3',
            ),
            'std' => '1',
            'weight' => '1',
            )
      );
	vc_add_param('cms_grid', array(
		"type" => "textfield",
            "heading" => esc_html__("Title", 'zk-monaco' ),
            "param_name" => "element_title",
            "holder" => 'div'
	     )
	);
	vc_add_param('cms_grid', array(
		"type" => "textfield",
            "heading" => esc_html__("Sub Title", 'zk-monaco' ),
            "param_name" => "element_sub_title",
		)
	);
	vc_add_param('cms_grid', array(
		"type" => "textarea",
            "heading" => esc_html__("Title Description", 'zk-monaco' ),
            "param_name" => "element_title_desc",
		)
	);
?>
<?php 
      $params = array(
            /* Add option show/hide image for default CMS GRID Layout*/
           array(
                  "type" => "dropdown",
                  "heading" => esc_html__("Show Image", 'zk-monaco' ),
                  "param_name" => "show_image",
                  "value" =>  array(
                        'Yes' => '1', 
                        'No' => '0'
                  ),
                  'std' => '1',
                  "template" =>  array(
                        'cms_grid.php',
                        'cms_grid--popup.php',
                  )
            ),
            /* Add option make first and second item is large for CMS Grid Portfolio Layout */
            array(
                  "type" => "dropdown",
                  "heading" => esc_html__("Make first and second item large", 'zk-monaco' ),
                  "param_name" => "fs_large",
                  "value" =>  array(
                        'Yes' => '1', 
                        'No' => '0'
                  ),
                  'std' => '1',
                  "template" =>  array('cms_grid--portfolio.php','cms_grid--portfolio2.php')
            ),
            /* Add option make space bettween each item */
            array(
                  "type" => "textfield",
                  "heading" => esc_html__("Add space bettween each item", 'zk-monaco' ),
                  "param_name" => "item_space",
                  "template" =>  array('cms_grid--portfolio2.php')
            ),
            /* Add option show/hide pagination for layout Gallery */
            array(
                  "type" => "checkbox",
                  "heading" => esc_html__("Show Pagination", 'zk-monaco' ),
                  "param_name" => "show_nav",
                  "std" =>  "false",
                  "template" =>  array(
                        'cms_grid--gallery.php',
                  )
            ),
            array(
                  "type" => "dropdown",
                  "heading" => esc_html__("Pagination Type", 'zk-monaco' ),
                  "param_name" => "nav_type",
                  "value" =>  array(
                        esc_html__('Default', 'zk-monaco') => '0', 
                        esc_html__('Load More', 'zk-monaco') => '1'
                  ),
                  'std' => '0',
                  'dependency' => array(
                        'element' => 'show_nav',
                        'value' => "true",
                  ),
            ),
      ) 
?>