<?php
class CMS_Instagram_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'cms_instagram_widget', // Base ID
            __('CMS Instagram', 'zk-monaco' ), // Name
            array('description' => esc_html__('CMS Instagram Widget', 'zk-monaco' ),) // Args
        );
        add_action('wp_enqueue_scripts', array($this, 'widget_scripts'));
    }
    function widget_scripts() {
        wp_enqueue_style('widget_cms_instagram_scripts', get_template_directory_uri() . '/inc/widgets/cms_instagram.css');
    }
    
    function widget($args, $instance) {      
        extract($args);
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
		$username = empty($instance['username']) ? '' : $instance['username'];
		$id = empty($instance['id']) ? '' : $instance['id'];
		$api = empty($instance['api']) ? '' : $instance['api'];
		$limit = empty($instance['number']) ? 9 : $instance['number'];
		$columns = empty($instance['columns']) ? 3 : $instance['columns'];
		$size = empty($instance['size']) ? 'thumbnail' : $instance['size'];
		$target = empty($instance['target']) ? '_self' : $instance['target'];
		$link = empty($instance['link']) ? '' : $instance['link'];
		$extra_class = empty($instance['extra_class']) ? '' : $instance['extra_class'];
		switch ($columns) {
			case 1:
	            $span = "col-xs-12 col-sm-12 col-md-12 col-lg-12 nopaddingall";
	            break;
	        case 2:
	            $span = "col-xs-6 col-sm-6 col-md-6 col-lg-6 nopaddingall";
	            break;
			case 3:
	            $span = "col-xs-4 col-sm-4 col-md-4 col-lg-4 nopaddingall";
	            break;
	        case 4:
	            $span = "col-xs-3 col-sm-3 col-md-3 col-lg-3 nopaddingall";
	            break;
	        default:
	            $span = "col-xs-4 col-sm-4 col-md-4 col-lg-4 nopaddingall";
	    }
        echo $before_widget;

        if (!empty($title))
            echo $before_title . $title . $after_title;
        if ($link != '') {
			?><div class="user"><a href="//instagram.com/<?php echo trim($username); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>"><?php echo $link; ?> @<?php echo trim($username); ?></a></div><?php
		}
        if ($id != '') {

			$media_array = $this->scrape_instagram($id, $api, $limit);

			if ( is_wp_error($media_array) ) {

			   echo $media_array->get_error_message();

			} else {

				// filter for images only?
				if ( $images_only = apply_filters( 'cs_images_only', FALSE ) )
					$media_array = array_filter( $media_array, array( $this, 'images_only' ) );

				?><div class="cs-instagram-pics clearfix <?php echo $extra_class;?>"><?php
				foreach ($media_array as $item) {
					echo '<div class="instagram-item '.$span.'"><a href="'. esc_url( $item['link'] ) .'" target="'. esc_attr( $target ) .'"><img src="'. esc_url($item[$size]['url']) .'"  alt="'. esc_attr( $item['description'] ) .'" title="'. esc_attr( $item['description'] ).'" style="width:100%; max-width:100%;"/></a></div>';
				}
				?></div><?php
			}
		}
        echo $after_widget;
    }         
    
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['username'] = trim(strip_tags($new_instance['username']));
		$instance['id'] = trim(strip_tags($new_instance['id']));
		$instance['api'] = trim(strip_tags($new_instance['api']));
		$instance['number'] = !absint($new_instance['number']) ? 9 : $new_instance['number'];
		$instance['columns'] = !absint($new_instance['columns']) ? 3 : $new_instance['columns'];
		$instance['size'] = (($new_instance['size'] == 'thumbnail' || $new_instance['size'] == 'large') ? $new_instance['size'] : 'thumbnail');
		$instance['target'] = (($new_instance['target'] == '_self' || $new_instance['target'] == '_blank') ? $new_instance['target'] : '_self');
		$instance['link'] = strip_tags($new_instance['link']);
         $instance['extra_class'] = $new_instance['extra_class'];
         
         return $instance;
    }
    
    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => esc_html__('Instagram', 'zk-monaco'), 'username' => '', 'api' => '', 'link' => esc_html__('Follow Us', 'zk-monaco'), 'number' => 9,'columns' => 3, 'size' => 'thumbnail', 'target' => '_self') );
		$title = esc_attr($instance['title']);
		$username = !empty($instance['username']) ? $instance['username'] : 'uking2135';
		$id = !empty($instance['id']) ? $instance['id'] : '3296209293';
		$api = !empty($instance['api']) ? $instance['api'] : '3296209293.1677ed0.4f6789c58d074800bc155afec14aa86e';
		$number = absint($instance['number']);
		$columns = absint($instance['columns']);
		$size = esc_attr($instance['size']);
		$target = esc_attr($instance['target']);
		$link = esc_attr($instance['link']);
        $extra_class = isset($instance['extra_class']) ? esc_attr($instance['extra_class']) : '';
        ?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'zk-monaco'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('username'); ?>"><?php esc_html_e('User ID', 'zk-monaco'); ?>: <a target="_blank" href="www.instagram.com/uking2135">www.instagram.com/uking2135</a> Get "uking2135". <input class="widefat" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" type="text" value="<?php echo $username; ?>" placeholder="uking2135" /></label></p>
		<p><label for="<?php echo $this->get_field_id('api'); ?>"><?php esc_html_e('Access Token', 'zk-monaco'); ?>: <a target="_blank" href="http://instagram.pixelunion.net/">Generate Instagram Access Token</a> <input class="widefat" id="<?php echo $this->get_field_id('api'); ?>" name="<?php echo $this->get_field_name('api'); ?>" type="text" value="<?php echo $api; ?>" placeholder="3296209293.1677ed0.4f6789c58d074800bc155afec14aa86e" /></label></p>
		<p><label for="<?php echo $this->get_field_id('id'); ?>"><?php esc_html_e('Client ID', 'zk-monaco'); ?>: Get numbers before dot from Access Token. <input class="widefat" id="<?php echo $this->get_field_id('id'); ?>" name="<?php echo $this->get_field_name('id'); ?>" type="text" value="<?php echo $id; ?>" placeholder="3296209293" /></label></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php esc_html_e('Number of photos', 'zk-monaco'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('columns'); ?>"><?php esc_html_e('Columns', 'zk-monaco'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('columns'); ?>" name="<?php echo $this->get_field_name('columns'); ?>" type="text" value="<?php echo $columns; ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('size'); ?>"><?php esc_html_e('Photo size', 'zk-monaco'); ?>:</label>
			<select id="<?php echo $this->get_field_id('size'); ?>" name="<?php echo $this->get_field_name('size'); ?>" class="widefat">
				<option value="thumbnail" <?php selected('thumbnail', $size) ?>><?php esc_html_e('Thumbnail', 'zk-monaco'); ?></option>
				<option value="large" <?php selected('large', $size) ?>><?php esc_html_e('Large', 'zk-monaco'); ?></option>
			</select>
		</p>
		<p><label for="<?php echo $this->get_field_id('target'); ?>"><?php esc_html_e('Open links in', 'zk-monaco'); ?>:</label>
			<select id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" class="widefat">
				<option value="_self" <?php selected('_self', $target) ?>><?php esc_html_e('Current window (_self)', 'zk-monaco'); ?></option>
				<option value="_blank" <?php selected('_blank', $target) ?>><?php esc_html_e('New window (_blank)', 'zk-monaco'); ?></option>
			</select>
		</p>
		<p><label for="<?php echo $this->get_field_id('link'); ?>"><?php esc_html_e('Link text', 'zk-monaco'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="text" value="<?php echo $link; ?>" /></label></p>
		<p>
			<label for="<?php echo $this->get_field_id('extra_class'); ?>">Extra Class:</label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('extra_class'); ?>" name="<?php echo $this->get_field_name('extra_class'); ?>" value="<?php echo $extra_class; ?>" />
		</p>
         <?php
         
    } 
    function scrape_instagram($id, $api, $slice = 9) {
		if (false === ($instagram = get_transient('instagram-media-'.sanitize_title_with_dashes($id)))) {

			$remote = wp_remote_get("https://api.instagram.com/v1/users/".$id."/media/recent/?access_token=".$api."&count=".$slice, true);

			if (is_wp_error($remote))
	  			return new WP_Error('site_down', __('Unable to communicate with Instagram.', 'zk-monaco'));

  			if ( 200 != wp_remote_retrieve_response_code( $remote ) )
  				return new WP_Error('invalid_response', __('Instagram did not return a 200.', 'zk-monaco'));

			$insta_array = json_decode($remote['body'], TRUE);

			if (!$insta_array)
	  			return new WP_Error('bad_json', __('Instagram has returned invalid data.', 'zk-monaco'));

			$images = $insta_array['data'];

			$instagram = array();

			foreach ($images as $image) {
					$image['link']                          = preg_replace( "/^http:/i", "", $image['link'] );
					$image['images']['thumbnail']           = preg_replace( "/^http:/i", "", $image['images']['thumbnail'] );
					$image['images']['standard_resolution'] = preg_replace( "/^http:/i", "", $image['images']['standard_resolution'] );

					$instagram[] = array(
						'description'   => $image['caption']['text'],
						'link'          => $image['link'],
						'time'          => $image['created_time'],
						'comments'      => $image['comments']['count'],
						'likes'         => $image['likes']['count'],
						'thumbnail'     => $image['images']['thumbnail'],
						'large'         => $image['images']['standard_resolution'],
						'type'          => $image['type']
					);
			}
			$instagram = base64_encode( serialize( $instagram ) );

			set_transient('instagram-media-'.sanitize_title_with_dashes($id), $instagram, apply_filters('cs_instagram_cache_time', HOUR_IN_SECONDS*2));
		}

		$instagram = unserialize( base64_decode( $instagram ) );

		return array_slice($instagram, 0, $slice);
	}
	function images_only($media_item) {

		if ($media_item['type'] == 'image')
			return true;

		return false;
	}
	function getInstaID($username, $client_id)
	{

	    $username = strtolower($username); // sanitization
	    $url = "https://api.instagram.com/v1/users/search?q=".$username."&client_id=".$client_id;
	    $get = wp_remote_get($url);
	    if (is_wp_error($get))
			return new WP_Error('site_down', __('Unable to communicate with Instagram.', 'zk-monaco'));

		if ( 200 != wp_remote_retrieve_response_code( $get ) )
			return new WP_Error('invalid_response', __('Instagram did not return a 200.', 'zk-monaco'));
	    $json = json_decode($get['body']);

	    foreach($json->data as $user)
	    {
	        if($user->username == $username)
	        {
	            return $user->id;
	        }
	    }

	    return '00000000'; // return this if nothing is found
	}

}

/**
* Class CS_Social_Widget
*/

function register_instagram_widget() {
    register_widget('CMS_instagram_Widget');
}

add_action('widgets_init', 'register_instagram_widget');
?>