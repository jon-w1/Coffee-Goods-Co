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
	<?php $video = cms_single_video(); ?>
	<div class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
		<div class="entry-meta cms-blog-meta cms-meta"><?php cms_standard_blog_detail(); ?></div>
	</div>
	<!-- .entry-header -->

	<div class="entry-content">
		<?php if($video) { 
			echo apply_filters('the_content', preg_replace(array('/\[embed(.*)](.*)\[\/embed\]/', '/\[video(.*)](.*)\[\/video\]/'), '', get_the_content(), 1)); 
		} else { 
			the_content(); 
		}
		?>
	</div>
	<!-- .entry-content -->

	<footer class="entry-footer clearfix">
	    <?php cms_get_socials_share(); ?>
	    <?php cms_single_tag(); ?>
		<?php edit_post_link( esc_html__( 'Edit', 'zk-monaco' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	<?php
		wp_link_pages( array(
			'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . esc_html__( 'Pages:', 'zk-monaco' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span class="page-numbers">',
			'link_after'  => '</span>',
		) );
	?>
	<!-- .entry-meta -->
</article>
<!-- #post -->
