<?php
/**
 * Twenty Twelve functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

/**
 * Add global values.
 */
global $smof_data, $cms_meta, $cms_base;

define('THEMENAME', 'zk-monaco');
if ( ! isset( $content_width ) ) $content_width = 1170;
/* Add base functions */
require( get_template_directory() . '/inc/base.class.php' );


if(class_exists("CMS_Base")){
    $cms_base = new CMS_Base();
}

/* Add ReduxFramework. */
if(!class_exists('ReduxFramework')){
    require( get_template_directory() . '/inc/ReduxCore/framework.php' );
}

/* Add theme options. */
require( get_template_directory() . '/inc/options/functions.php' );

    
/* Add theme elements */
add_action('vc_before_init', 'cms_vc_elements');
function cms_vc_elements(){
    if(class_exists('CmsShortCode')){
        $element = get_template_directory() . '/inc/elements/googlemap';
        require( $element . '/cms_googlemap.php' );
    }
}

add_action('vc_before_init', 'cms_vc_params');
function cms_vc_params() {
    require( get_template_directory() . '/vc_params/vc_btn.php' );
    require( get_template_directory() . '/vc_params/vc_icon.php' );
    require( get_template_directory() . '/vc_params/vc_gallery.php' );
}

/* Add SCSS */
if(!class_exists('scssc')){
    require( get_template_directory() . '/inc/libs/scss.inc.php' );
}

/* Add Meta Core Options */
if(is_admin()){
    
    if(!class_exists('CsCoreControl')){
        /* add mete core */
        require( get_template_directory() . '/inc/metacore/core.options.php' );
        /* add meta options */
        require( get_template_directory() . '/inc/options/meta.options.php' );
    }
    
    /* tmp plugins. */
    require( get_template_directory() . '/inc/options/require.plugins.php' );
}

/* Add Template functions */
require( get_template_directory() . '/inc/template.functions.php' );

/* Static css. */
require( get_template_directory() . '/inc/dynamic/static.css.php' );

/* Dynamic css*/
require( get_template_directory() . '/inc/dynamic/dynamic.css.php' );

/* Add mega menu */
if(!class_exists('HeroMenuWalker')){
    require( get_template_directory() . '/inc/megamenu/mega-menu.php' );
}

/* Add widgets */
require( get_template_directory() . '/inc/widgets/cms_social.php' );
require( get_template_directory() . '/inc/widgets/cms_instagram.php' );

/* Add tinymce */
require( get_template_directory() . '/inc/tinymce/button.php' );

/* load template functions : Post Favorite */
require_once( get_template_directory() . '/inc/post_favorite.php' );

/* Woo commerce function */
if(class_exists('WooCommerce')){
	/* Add widgets */
	require( get_template_directory() . '/inc/widgets/cart_search.php' );
	/* Custom WooCommerce Hook  */
    require get_template_directory() . '/woocommerce/wc-template-hooks.php';
}
/**
 * Change default woocommerce thumbnails size
 * This action need to do when active Woo, so it can not add in if(class_exists('WooCommerce'))
 * @since 1.0.3
 * @author Chinh Duong Manh
 */

add_action('init', 'cms_change_default_woo_thumb_size');
function cms_change_default_woo_thumb_size(){
	register_activation_hook('woocommerce/woocommerce.php', 'cms_woocommerce_image_dimensions');
}
function cms_woocommerce_image_dimensions() {
    global $pagenow;
 
    $catalog = array(
        'width'     => '270',   // px
        'height'    => '320',   // px
        'crop'      => 1        // true
    );
    $single = array(
        'width'     => '450',   // px
        'height'    => '533',   // px
        'crop'      => 1        // true
    );
    $thumbnail = array(
        'width'     => '100',   // px
        'height'    => '120',   // px
        'crop'      => 1        // true
    );
    /* Image sizes */
    update_option( 'shop_catalog_image_size', $catalog );       /* Product category thumbs */
    update_option( 'shop_single_image_size', $single );         /* Single product image */
    update_option( 'shop_thumbnail_image_size', $thumbnail );   /* Image gallery thumbs */
}

/**
 * CMS Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * CMS Theme supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since 1.0.0
 */
function cms_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'zk-monaco' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'zk-monaco' , get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds title tag
	add_theme_support( "title-tag" );
	
	// Add woocommerce
	add_theme_support('woocommerce');
	
	// Adds custom header
	add_theme_support( 'custom-header' );
	
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'video', 'audio' , 'gallery', 'quote',) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'zk-monaco' ) );
	register_nav_menu( 'leftmenu', esc_html__( 'Left Menu', 'zk-monaco' ) );
	register_nav_menu( 'rightmenu', esc_html__( 'Right Menu', 'zk-monaco' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'blog-grid', 1170, 790, true );
	add_image_size( 'blog-masonry', 835 );
	add_image_size( 'blog-masonry4', 390, 528, true );
}

add_action( 'after_setup_theme', 'cms_setup' );

/**
 * Get meta data.
 * @author Fox
 * @return mixed|NULL
 */
function cms_meta_data(){
    global $post, $cms_meta;
    if(isset($post->ID)){
        $cms_meta = json_decode(get_post_meta($post->ID, '_cms_meta_data', true));
    } else {
        $cms_meta = null;
    }
}
add_action('wp', 'cms_meta_data');

/**
 * Get post meta data.
 * @author Fox
 * @return mixed|NULL
 */
function cms_post_meta_data(){
    global $post;
    if(isset($post->ID)){
        return json_decode(get_post_meta($post->ID, '_cms_meta_data', true));
    } else {
        return null;
    }
}

/**
 * Enqueue scripts and styles for front-end.
 * @author Fox
 * @since CMS SuperHeroes 1.0
 */
function cms_scripts_styles() {
    
	global $smof_data, $wp_styles, $cms_meta;
	
	/** theme options. */
	$script_options = array(
		'header_type'=> $smof_data['header_fixed'],
	    'menu_sticky'=> $smof_data['menu_sticky'],
	    'menu_sticky_tablets'=> $smof_data['menu_sticky_tablets'],
	    'menu_sticky_mobile'=> $smof_data['menu_sticky_mobile'],
	    'paralax' => 1,
	    'back_to_top'=> $smof_data['footer_botton_back_to_top']
	);

	/*------------------------------------- JavaScript ---------------------------------------*/
	
	
	/** --------------------------libs--------------------------------- */
	
	
	/* Adds JavaScript Bootstrap. */
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.2');
	
	
	/* Add smoothscroll plugin */
	if($smof_data['smoothscroll']){
	   wp_enqueue_script('smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.min.js', array( 'jquery' ), '1.0.0', true);
	}
	
	
	/** --------------------------custom------------------------------- */
	
	/* Add main.js */
	wp_register_script('cmssuperheroes-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true);
	wp_localize_script('cmssuperheroes-main', 'CMSOptions', $script_options);
	wp_enqueue_script('cmssuperheroes-main');
	/* Add menu.js */
    wp_enqueue_script('cmssuperheroes-menu', get_template_directory_uri() . '/assets/js/menu.js', array( 'jquery' ), '1.0.0', true);
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

    /*------------------------------------- Stylesheet ---------------------------------------*/
	
	/** --------------------------libs--------------------------------- */
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.4');
	
	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');

	/* Loads Font Ionicons. */
	wp_enqueue_style('font-ionicons', get_template_directory_uri() . '/assets/css/ionicons.min.css', array(), '2.0.1');

	/* Loads Pe Icon. */
	wp_enqueue_style('cms-icon-pe7stroke', get_template_directory_uri() . '/assets/css/pe-icon-7-stroke.css', array(), '1.0.1');
	
	/** --------------------------custom------------------------------- */
	
	/* Loads our main stylesheet. */
	wp_enqueue_style( 'cmssuperheroes-style', get_stylesheet_uri(), array( 'bootstrap' ));

	/* Loads the Internet Explorer specific stylesheet. */
	wp_enqueue_style( 'zk-monaco-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'cmssuperheroes-style' ), '20160822' );
	$wp_styles->add_data( 'zk-monaco-ie', 'conditional', 'lt IE 11' );
	
	/* WooCommerce */
	if(class_exists('WooCommerce')){
	    wp_enqueue_style( 'cms-woocommerce', get_template_directory_uri() . "/assets/css/woocommerce.css", array(), '1.0.0');
	}
	
	/* Load static css*/
	wp_enqueue_style('cmssuperheroes-static', get_template_directory_uri() . '/assets/css/static.css', array( 'cmssuperheroes-style' ), '1.0.0');

	/* Load PrettyPhoto*/
	wp_enqueue_script('prettyphoto');
    wp_enqueue_style('prettyphoto');
}

add_action( 'wp_enqueue_scripts', 'cms_scripts_styles' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Fox
 */
function cms_widgets_init() {
	register_sidebar( array(
		'name' => esc_html__( 'Main Sidebar', 'zk-monaco' ),
		'id' => 'sidebar-1',
		'description' => esc_html__( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'zk-monaco' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Slider before Header', 'zk-monaco' ),
    	'id' => 'sidebar-11',
    	'description' => esc_html__( 'You can use this are to add revelution slider or anything else. It will appears at the top of page', 'zk-monaco' ),
    	'before_widget' => '<section id="cms-showcase" class="cms-showcase" role="complementary">',
    	'after_widget' => '</section>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	register_sidebar( array(
    	'name' => esc_html__( 'Top Header', 'zk-monaco' ),
    	'id' => 'sidebar-12',
    	'description' => esc_html__( 'It will appears at the top of Header', 'zk-monaco' ),
    	'before_widget' => '<div id="%1$s" class="cms-topheader">',
    	'after_widget' => '</div><!-- .cms-topheader -->',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	register_sidebar( array(
    	'name' => esc_html__( 'Header Widget', 'zk-monaco' ),
    	'id' => 'sidebar-8',
    	'description' => esc_html__( 'Appears in header, beside menu', 'zk-monaco' ),
    	'before_widget' => '',
    	'after_widget' => '',
    	'before_title' => '',
    	'after_title' => '',
	) );

	register_sidebar( array(
    	'name' => esc_html__( 'Footer Top 1', 'zk-monaco' ),
    	'id' => 'sidebar-2',
    	'description' => esc_html__( 'Appears when using the optional Footer with a page set as Footer Top 1', 'zk-monaco' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => esc_html__( 'Footer Top 2', 'zk-monaco' ),
    	'id' => 'sidebar-3',
    	'description' => esc_html__( 'Appears when using the optional Footer with a page set as Footer Top 2', 'zk-monaco' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => esc_html__( 'Footer Top 3', 'zk-monaco' ),
    	'id' => 'sidebar-4',
    	'description' => esc_html__( 'Appears when using the optional Footer with a page set as Footer Top 3', 'zk-monaco' ),
    	'before_widget' => '<aside class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
		
	register_sidebar( array(
    	'name' => esc_html__( 'Footer Bottom 1', 'zk-monaco' ),
    	'id' => 'sidebar-5',
    	'description' => esc_html__( 'Appears when using the optional Footer Bottom with a page set as Footer Bottom 1', 'zk-monaco' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => esc_html__( 'Footer Bottom 2', 'zk-monaco' ),
    	'id' => 'sidebar-6',
    	'description' => esc_html__( 'Appears when using the optional Footer Bottom with a page set as Footer Bottom 2', 'zk-monaco' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	register_sidebar( array(
    	'name' => esc_html__( 'Footer Bottom 3', 'zk-monaco' ),
    	'id' => 'sidebar-7',
    	'description' => esc_html__( 'Appears when using the optional Footer Bottom with a page set as Footer Bottom 3', 'zk-monaco' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	if(class_exists('woocommerce')){
		register_sidebar( array(
	    	'name' => esc_html__( 'WooCommerce Sidebar', 'zk-monaco' ),
	    	'id' => 'sidebar-9',
	    	'description' => esc_html__( 'Appears on WooCommerce page', 'zk-monaco' ),
	    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    	'after_widget' => '</aside>',
	    	'before_title' => '<h3 class="wg-title">',
	    	'after_title' => '</h3>',
		) );
	}
	if(class_exists('newsletter')){
		register_sidebar( array(
			'name' => esc_html__( 'Newsletter in Page', 'zk-monaco' ),
			'id' => 'sidebar-10',
			'description' => esc_html__( 'Appears on Page when use VC Widgetised Sidebar and call to this own', 'zk-monaco' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'cms_widgets_init' );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since 1.0.0
 */
function cms_page_menu_args( $args ) {
    if ( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'cms_page_menu_args' );

/**
 * Save custom theme meta. 
 * 
 * @since 1.0.0
 */
function cms_save_meta_boxes($post_id) {
    
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    /* update field subtitle */
    if(isset($_POST['post_subtitle'])){
        update_post_meta($post_id, 'post_subtitle', $_POST['post_subtitle']);
    }
}

add_action('save_post', 'cms_save_meta_boxes');

/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since 1.0.0
 */
function cms_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'zk-monaco' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'zk-monaco' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'zk-monaco' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since 1.0.0
 */
function cms_paging_nav() {
    // Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-angle-left"></i>',
			'next_text' => '<i class="fa fa-angle-right"></i>',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation clearfix" role="navigation">
			<div class="pagination loop-pagination">
				<?php echo ''.$links; ?>
			</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}

function cms_paging_nav2() {
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	$the_query = $GLOBALS['wp_query'];
	if ( $the_query->have_posts() ) : ?>

	<nav class="navigation paging-navigation cms-paging-navigation2 clearfix" role="navigation">
		<div class="pull-left h5">
		<?php 
			previous_posts_link( '<i class="fa fa-angle-left"></i> Newer Posts' );
		?>
		</div>
		<div class="pull-right h5">
		<?php 
			next_posts_link( 'Older Posts <i class="fa fa-angle-right"></i>', $the_query->max_num_pages );
		?>
		</div>
	</nav><!-- .navigation -->
<?php
	// clean up after our query
	wp_reset_postdata();
	endif;  
}

/**
* Display navigation to next/previous post when applicable.
*
* @since 1.0.0
*/
function cms_post_nav() {
    global $post;
    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    if ( ! $next && ! $previous )
        return;
    ?>
	<nav class="navigation post-navigation clearfix" role="navigation">
		<div class="nav-links clearfix">
			<?php previous_post_link( '%link', _x( '<span class="meta-nav pull-left">&larr;'.esc_html__(' Back', 'zk-monaco' ).'</span>', 'Previous post link', 'zk-monaco' ) ); ?>
			<?php next_post_link( '%link', _x( '<span class="meta-nav pull-right">'.esc_html__('Next ', 'zk-monaco' ).'&rarr;</span>', 'Next post link', 'zk-monaco' ) ); ?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/* Custom Comment style */
function cms_comment_form($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		
	</div>
	<div class="comment-meta-wrap">
		<?php printf( '<cite class="fn h5">%s</cite>' , get_comment_author_link() ); ?>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'zk-monaco' ); ?></em>
			<br />
		<?php endif; ?>
		
		<div class="comment-meta commentmetadata playfairdisplay">
			<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __('%1$s at %2$s', 'zk-monaco' ), get_comment_date(),  get_comment_time() ); 
					//echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' ago';
				?>
			</a>
				<?php edit_comment_link( esc_html__( '(Edit)', 'zk-monaco' ), '  ', '' );
			?>
		</div>
		<div class="comment-reply">
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
		<?php comment_text(); ?>
	</div>
	
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

/**
 * limit words
 * 
 * @since 1.0.0
 */
if (!function_exists('cms_limit_words')) {
    function cms_limit_words($string, $word_limit) {
        $words = explode(' ', $string, ($word_limit + 1));
        if (count($words) > $word_limit) {
            array_pop($words);
        }
        return implode(' ', $words)."";
    }
}

/* Adds style for admin */
function load_custom_cms_admin_style() {
    wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/assets/css/cms-admin.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_cms_admin_style' );


/* Remove Element VC */
if(class_exists('Vc_Manager')){
	add_action('vc_before_init', 'cms_remove_element');
	function cms_remove_element(){
		vc_remove_element( "cms_fancybox" );
	}
}


/**
 * demo data.
 *
 * config.
 */
add_filter('ef3-theme-options-opt-name', 'et3_theme_framework_set_demo_opt_name');

function et3_theme_framework_set_demo_opt_name(){
    return 'smof_data';
}

add_filter('ef3-replace-content', 'et3_theme_framework_replace_content', 10 , 2);

function et3_theme_framework_replace_content($replaces, $attachment){
    return array(
    	'/category="(.+?)"/' => 'category=""',
    	'/cat="(.+?)"/' => 'cat=""',
    	'/_cms_post_categories:"(.+?)"/' => '_cms_post_category:""',
    	'/_cms_portfolio_categories:"(.+?)"/' => '_cms_portfolio_category:""',
        '/tax_query:/' => 'remove_query:',
        '/categories:/' => 'remove_query:',
    );
}

add_filter('ef3-replace-theme-options', 'et3_theme_framework_replace_theme_options');

function et3_theme_framework_replace_theme_options(){
    return array(
        'dev_mode' => 0,
    );
}
add_filter('ef3-enable-create-demo', 'et3_theme_framework_enable_create_demo');

function et3_theme_framework_enable_create_demo(){
    return false;
}
/**
 * Set home page.
 *
 * get Home Page and update options.
 *
 * @return Home page .
 * @author Chinh Duong Manh
 */
function zk_monaco_set_home_page(){

    $home_page = 'Home';

    $page = get_page_by_title($home_page);

    if(!isset($page->ID))
        return ;

    update_option('show_on_front', 'page');
    update_option('page_on_front', $page->ID);
}

add_action('ef3-import-finish', 'zk_monaco_set_home_page');

/**
 * Set woo page.
 *
 * get array woo page title and update options.
 *
 * @author Chinh Duong Manh
 */
function zk_monaco_set_woo_page(){
    
    $woo_pages = array(
        'woocommerce_shop_page_id' => 'Shop',
        'woocommerce_cart_page_id' => 'Cart',
        'woocommerce_checkout_page_id' => 'Checkout',
        'woocommerce_myaccount_page_id' => 'My Account'
    );
    
    foreach ($woo_pages as $key => $woo_page){
    
        $page = get_page_by_title($woo_page);
    
        if(!isset($page->ID))
            return ;
             
        update_option($key, $page->ID);
    
    }
}

add_action('ef3-import-finish', 'zk_monaco_set_woo_page');
