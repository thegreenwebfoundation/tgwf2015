	<?php get_header(); ?>

	<div class="container site-main" id="main" role="main">
		<div class="row">
			<?php if ( have_posts() ) : ?>
				<div class="col-md-12">
					<h1><?php echo single_cat_title(); ?></h1>
				</div>
				<?php while ( have_posts() ) : the_post(); ?>  
					<div class="article-entry">								
						<div class="col-md-4 col-sm-4">
							<div class="box">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									} else { ?>
										<img class="news-image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/the-green-web-placeholder.svg" alt="News items without featured image">								
									<?php } ?>
								</a>
							</div>						
							<a href="<?php the_permalink(); ?>"><?php the_title('<h2>','</h2>'); ?></a>
							<div class="meta">
								<span class=""><span class="fa fa-pencil"></span><?php the_date(); ?></span>
							</div>
							<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>"><?php the_content(); ?></a>
							<hr class="visible-xs-block">
						</div>	
					</div>
				<?php endwhile; ?>
			<?php endif; ?>	
		</div>
	</div>				
	
	<?php get_footer(); ?>