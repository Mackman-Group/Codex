<?php
/*
Template Name: Home Page
*/
get_header(); ?>

	<div class="fullwidth-header" >
		<?php dynamic_sidebar("Header"); ?>
	</div>
	
	<div class="row">
	
	<!-- Row for main content area -->
	<div class="small-12 large-12 columns" id="content" role="main">
	
	<?php echo wp_list_categories('orderby=name&title_li='); ?> 
	
	<?php /* Start loop */ ?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
		</article>
	<?php endwhile; // End the loop ?>

	</div>
		
<?php get_footer(); ?>
