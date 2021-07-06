	<?php get_header(); ?>
	
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>  
			<article>			
				<div class="container site-main" id="main" role="main">
					<div class="row">
						<div class="meta col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
							<a href="<?php the_permalink(); ?>"><?php the_title('<h1>','</h1>'); ?></a>
							<?php the_content(); ?>
						</div>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>		
	
	<?php get_footer(); ?>