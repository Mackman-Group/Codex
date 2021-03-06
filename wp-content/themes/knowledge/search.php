<?php get_header(); ?>

<div class="row">

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" id="content" role="main">
	
		<h2><?php _e('Search Results for', 'reverie'); ?> "<?php echo get_search_query(); ?>"</h2>
	
	<?php if ( have_posts() ) : ?>
	
		<?php /* Start the Loop */ ?>
		<?php 
		while ( have_posts() ) : the_post();
			if ( ! is_user_logged_in() )
			{
				if( ! has_tag("private") )
				{
					get_template_part( 'content', get_post_format() );  
				}
				else
				{
					get_template_part( 'content', 'none' );
				}
			}
			else
			{
				get_template_part( 'content', get_post_format() );
			}
		endwhile; 
		?>
		
		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		
	<?php endif; // end have_posts() check ?>
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('reverie_pagination') ) { reverie_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>
	<?php get_sidebar(); ?>
		
<?php get_footer(); ?>