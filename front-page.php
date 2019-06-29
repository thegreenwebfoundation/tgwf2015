		<?php get_header(); ?>

			<div class="container green-check">
				<div class="video-wrapper">
				    <video class="cover-video" poster="<?php echo get_stylesheet_directory_uri(); ?>/img/video-fallback.jpg">
<!--
				        <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/dreamscapes.webm" type="video/webm">
				        <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/dreamscapes.mp4" type="video/mp4">
-->
				    </video>
				</div>		
				<div class="row">
					<div class="col-md-7 col-md-offset-2">
						<h1>Is your site hosted <span class="tgw-green">green</span>?</h1>
						<blockquote class="tgw-medium-grey">One day the Internet will run entirely on renewable energy. The Green Web Foundation believes that day should be within reach, and develops tools to speed up the transition towards a green Internet</blockquote>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<form action="green-web-check" method="GET">
							<div class="col-md-8 col-sm-8 input">
								<input name="url" class="form-control input-lg" type="text" placeholder="http://www.yourwebsite.com">
							</div>		
							<div class="col-md-3 col-sm-3">
								<button type="submit" class="go-button">Check&nbsp;&nbsp;<span class="fa fa-chevron-right"></span></button>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-2">
						<span><strong class="greencheck_checks_total">501.345.271</strong> checks performed to date,</span><br>
						<span><strong class="greencheck_checks_percentage">13%</strong> is powered by renewable energy</span>
					</div>								
				</div>
			</div>
			
			<div class="container activities">		
				<div class="row">
					<div id="left" class="col-md-3 col-sm-3 activity">
						<p style='text-align:center;font-size:smaller;'>Percentage green domains</p>
						<canvas id="myChart" width="270" height="150"></canvas>
					</div>
					<div id="middle" class="col-md-6 col-sm-6 activity">
						<div id="activity_feed_checks"></div>					
					</div>
					<div id="right" class="col-md-3 col-sm-3 activity">
						<span><img class="img-responsive" src="https://graphite.thegreenwebfoundation.org/render/?width=230&height=175&_salt=1409819122.824&target=alias%28hitcount%28stats.api.greencheck_job.checks%2C%221d%22%29%2C%22Checks%20per%20hour%22%29&bgcolor=FFFFFF&colorList=%2370ba2b&fgcolor=000000&title=Greenchecks%20performed%20per%20day&from=-1months&hideLegend=true&yMin=0&xFormat=%25d-%25m&yUnitSystem=none&hideGrid=true" alt="Trends Greenweb checks"></span>					
					</div>					
				</div>
			</div>			
			
			<div class="container scroll-down">		
				<div class="row">
					<img class="wow tada" data-wow-iteration="3" src="<?php echo get_stylesheet_directory_uri(); ?>/img/scroll-down.png" alt="Scroll down!">
				</div>
			</div>
			
		</div>
	</div>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>    
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
	
	<!-- News -->
	<section class="news">
		<?php
		$args = array( 
				'post_type' => 'post',
				'posts_per_page' => 3 
		);
		$news_query = new WP_Query( $args );
	
		if ($news_query->have_posts()) : ?>	
		<div class="container visual-app">
			<div class="row">
				<div class="col-md-12">
					<h2>News</h2>
				</div>
	
				<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
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
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title_attribute(); ?>">
							<h3><?php the_title();?></h3>					
							<?php the_excerpt() ?>
						</a>
					</div>										
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>	
			</div>
		</div>
		<?php endif; ?>			
		<div id="read-more" class="container">
			<div class="row text-center">
				<a href="news" class="cta">More news</a>
			</div>
		</div>				
	</section>

	
	<?php get_footer(); ?>
