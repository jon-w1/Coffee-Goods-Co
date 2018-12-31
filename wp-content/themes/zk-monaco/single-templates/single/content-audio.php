<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
	<?php $audio = cms_single_audio(); ?>
	<div class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
		<div class="entry-meta cms-blog-meta cms-meta"><?php cms_standard_blog_detail(); ?></div>
	</div>
	<!-- .entry-header -->

	<div class="entry-content">
		<?php if($audio){ echo apply_filters('the_content', preg_replace(array('/\[soundcloud(.*)](.*)\[\/soundcloud\]/', '/\[soundcloud(.*)\]/', '/\[embed(.*)](.*)\[\/embed\]/','/\[audio(.*)\](.*)\[\/audio\]/', '/\[audio(.*)\]/', '/\[playlist(.*)\]/'), '', get_the_content(), 1));} else { the_content(); }
    		wp_link_pages( array(
        		'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . esc_html__( 'Pages:', 'zk-monaco' ) . '</span>',
        		'after'       => '</div>',
        		'link_before' => '<span class="page-numbers">',
        		'link_after'  => '</span>',
    		) );
		?>
	</div>
	<!-- .entry-content -->

	<footer class="entry-footer clearfix">
	    <?php cms_get_socials_share(); ?>
	    <?php cms_single_tag(); ?>
		<?php edit_post_link( esc_html__( 'Edit', 'zk-monaco' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	<!-- .entry-meta -->
</article>
<!-- #post -->
