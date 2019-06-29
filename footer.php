			<footer id="contact" class="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-4 column left">
							<?php dynamic_sidebar( 'footer-left' ); ?>
						</div>
						<div class="col-md-4 col-sm-4 column middle">
							<?php dynamic_sidebar( 'footer-middle' ); ?>
						</div>	
						<div class="col-md-4 col-sm-4 column right">
							<h3>Newsletter - stay up to date</h3>
							<form>
							  <div class="form-group">
							    <input type="text" class="form-control" id="Name" placeholder="Enter name" disabled>
							  </div>					
							  <div class="form-group">
							    <input type="text" class="form-control" id="Email" placeholder="Enter email" disabled>
							  </div>
							  <button type="submit" class="cta" disabled>Submit</button>
							</form>					
						</div>	
					</div>
				</div>
			</footer>										
	
		</div> <!-- section -->
	</div> <!-- post-x -->

	<?php wp_footer(); ?>
		
</body>
</html>