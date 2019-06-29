	<?php get_header(); ?>
	
	<div class="container site-main" id="main" role="main">
		<div class="row">

			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>  
					<article>					
						<div class="meta col-md-4 col-sm-4">
							<a href="<?php the_permalink(); ?>"><?php the_title('<h1>','</h1>'); ?></a>
							<?php the_content(); ?>
						</div>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>	
	
		</div> <!-- row -->
	</div>	<!-- container -->
	
	<?php get_footer(); ?>