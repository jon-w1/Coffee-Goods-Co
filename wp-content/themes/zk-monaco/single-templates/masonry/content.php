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

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
	
	<?php if(has_post_thumbnail()) {?>
		<div class="entry-media cms-blog-media cms-media"><?php the_post_thumbnail('blog-masonry'); ?></div>
	<?php } else {
		the_excerpt();
	 } ?>
	<div class="entry-content">
		<div class="entry-header">
			<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<div class="entry-meta cms-blog-meta cms-meta"><?php cms_standard_blog_detail(); ?></div>
		</div>
		<?php cms_archive_readmore(); ?>
		<!-- .entry-header -->
		<?php 
    		wp_link_pages( array(
        		'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . esc_html__( 'Pages:', 'zk-monaco' ) . '</span>',
        		'after'       => '</div>',
        		'link_before' => '<span class="page-numbers">',
        		'link_after'  => '</span>',
    		) );
		?>
	</div>
	<!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'zk-monaco' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
	<!-- .entry-meta -->
</article>
<!-- #post -->
