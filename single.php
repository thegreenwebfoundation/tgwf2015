	<?php get_header(); ?>
	
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>  
			<article>
				<?php if ( has_post_thumbnail() ) { 
					$image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "post-thumbnail" ); ?>
					<div class="container">
						<div class="row featured-image" style="background-image:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('<?php echo $image_data[0]; ?>')">
							<div class="col-md-6 col-md-offset-2 article-title">
								<?php the_title('<h1 class="article-title">','</h1>') ?>
							</div>	    					
						</div>	
					</div>
				<?php } else { ?>
					<div class="container">
						<div class="row featured-image" style="background-image:url('<?php echo get_stylesheet_directory_uri() . '/img/the-green-web-placeholder.svg'  ?>')">
							<div class="col-md-6 col-md-offset-2 article-title">
								<?php the_title('<h1 class="article-title tgw-body">','</h1>') ?>
							</div>	    					
						</div>	
					</div>					
				<?php } ?>
				
		
			
				<div class="container site-main" id="main" role="main">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
							<aside>
								<div class="row meta">
									<div class="col-md-4 col-sm-4"><span><span class="fa fa-pencil"></span><?php the_date(); ?></span></div>
									<div class="col-md-4 col-sm-4"><span><span class="fa fa-user"></span><?php the_author(); ?></span></div>
									<div class="col-md-4 col-sm-4"><span><span class="fa fa-bookmark"></span><?php the_category(' '); ?></span></div>														
								</div>
							</aside>
							
							<hr>
						 
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
		<?php
			$args = array(
				'post_type' 		=> 'post',
				'posts_per_page' 	=> '3',
				'oder'				=> 'DESC',
				'post__not_in'		=> array(get_the_id())
			);
			$tgwf_posts = new WP_Query( $args );
			if ( $tgwf_posts->have_posts() ) : ?>
				<aside>
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
								<h2><?php _e('More news','tgwf'); ?></h2>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">					
							<?php while ( $tgwf_posts->have_posts() ) : $tgwf_posts->the_post(); ?>		
								<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 post-entry">
									<div class="row">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>">
											<div class="col-md-4">
												<div class="box">
													<?php if ( has_post_thumbnail() ) {
														the_post_thumbnail();
													} else { ?>
														<img class="news-image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/the-green-web-placeholder.svg" alt="News items without featured image">								
													<?php } ?>
												</div>
											</div>
											<div class="col-md-8">
												<h3><?php the_title(); ?></h3>
												<?php the_excerpt(); ?>
											</div>
										</a>									
									</div>
									<div class="clearfix"></div>
									<hr>									
								</div>							
							<?php endwhile; ?>
						</div>
					</div>							
				</aside>
			<?php endif;
			wp_reset_postdata();
		?>
	<?php endif; ?>		
	
	<?php get_footer(); ?>
