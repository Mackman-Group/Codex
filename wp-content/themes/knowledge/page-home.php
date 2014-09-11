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
	
	<?php //get all categories then display all posts in each term
		$taxonomy = 'category';
		$param_type = 'category__in';
		$term_args=array( 'orderby' => 'name', 'order' => 'ASC' );
		$terms = get_terms($taxonomy, $term_args);
		
		if ($terms) 
		{
			foreach( $terms as $term ) 
			{
				$args=array(
					"$param_type" => array($term->term_id),
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'caller_get_posts'=> 1
				);
				
				$my_query = null;
				$my_query = new WP_Query($args);
				
				#if( $my_query->have_posts() ) 
				#{
					$querychildren = get_category_children($term->term_id);
					if( $querychildren != ""  )
					{
						echo '<div class="category section">';
							echo '<h3>';
								echo $term->name;
							echo '</h3>';
							$childcategories =  get_categories('child_of='.$term->term_id);  
							foreach  ($childcategories as $category) 
							{
								//Display the sub category information using $category values like $category->cat_name
								echo '<div class="subcategory">';
								echo '<h5>'.$category->name.'</h5>';
								echo '<ul>';

								foreach (get_posts('cat='.$category->term_id) as $post) 
								{
									if ( ! is_user_logged_in() )
									{
										if( ! has_tag("private") )
										{
											setup_postdata( $post );
											echo '<li><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></li>';   
										}
									}
									else
									{
										setup_postdata( $post );
										echo '<li><a href="'.get_permalink($post->ID).'">'.get_the_title().'</a></li>'; 
									}
								}  
								echo '</ul>';
								echo '</div>';
							}
							echo '<ul>';?>
								<?php
									while ($my_query->have_posts()) : $my_query->the_post(); 
										if ( ! is_user_logged_in() )
										{
											if( ! has_tag("private") )
											{
												echo '<li><a href="'; echo the_permalink(); echo '" rel="bookmark" title="Permanent Link to '; echo the_title_attribute(); echo '">'; echo the_title(); echo '</a></li>';
											}
										}
										else
										{
											echo '<li><a href="'; echo the_permalink(); echo '" rel="bookmark" title="Permanent Link to '; echo the_title_attribute(); echo '">'; echo the_title(); echo '</a></li>';
										}
									endwhile;
								?>
							<?php
							echo '</ul>';
						echo '</div>';
					?>
					<?php
					}
					else
					{
						if( $term->parent == 0 )
						{?>
						<div class="category section">
							<h3>
								<?php echo $term->name;?>
							</h3>
							<ul>
								<?php
									while ($my_query->have_posts()) : $my_query->the_post(); 
										if ( ! is_user_logged_in() )
										{
											if( ! has_tag("private") )
											{
												echo '<li><a href="'; echo the_permalink(); echo '" rel="bookmark" title="Permanent Link to '; echo the_title_attribute(); echo '">'; echo the_title(); echo '</a></li>';
											}
										}
										else
										{
											echo '<li><a href="'; echo the_permalink(); echo '" rel="bookmark" title="Permanent Link to '; echo the_title_attribute(); echo '">'; echo the_title(); echo '</a></li>';
										}
									endwhile;
								?>
							</ul>
						</div>
						<?php
						}
					}
				#}
			}
		}
		wp_reset_query();  // Restore global post data stomped by the_post().
	?>

	</div>
		
<?php get_footer(); ?>