<html>

<head>
	<title>Qidz-responsive</title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . "/css/qidz-responsive.css" ?>">
	<meta name="viewport" content="width=device-width">
</head>

<body>
	<div class="main">

		<?php if (is_active_sidebar('custom-sidebar-1')) { ?>
			<div id="custom-sidebar-1">
				<?php dynamic_sidebar('custom-sidebar-1'); ?>
			</div>
		<?php } ?>
		<?php wp_footer();
		// the_widget("TestOne_Custom_Widget");
		?>
		<div class="footer">

			<div class="footer-left">
				<div class="footer-left-list">
					<ul>
						<li>
							<span class="footer-border-red">
								<h3>About Qidz</h3>
							</span>
						</li>
						<li>About Us</li>
						<li>Press</li>
						<li>Terms & Conditions</li>
						<li>Refund & Cancellations</li>
						<li>Privacy Policy</li>
					</ul>
				</div>
				<div class="footer-left-list">
					<ul>
						<li>
							<span class="footer-border-blue">
								<h3>Reach Us</h3>
							</span>
						</li>
						<li>Do Business With Us</li>
						<li>Advertise With Us</li>
						<li>Carrer</li>
						<li>Contact Us</li>
						<li>FAQ's</li>
					</ul>
				</div>
				<div class="footer-left-list">
					<ul>
						<li>
							<span class="footer-border-red">
								<h3>Kids Activities </h3>
							</span>
						</li>
						<li>Kids Collection</li>
						<li>Outdoor</li>
						<li>Indoors</li>
						<li>Popular Activities</li>
						<br>
					</ul>
				</div>
			</div>
			<div class="footer-right">
				<div class="footer-right-upper">
					<span class="footer-border-blue">
						<h3>Follow Us Social Media:</h3>
					</span>
					<ul>
						<li>
							<a href="#"><img src="<?php echo get_template_directory_uri() . "/image/" ?>fb.png"></a>
						</li>
						<li>
							<a href="#"><img src="<?php echo get_template_directory_uri() . "/image/" ?>twitter.png"></a>
						</li>
						<li>
							<a href="#"><img src="<?php echo get_template_directory_uri() . "/image/" ?>ball.png"></a>
						</li>
						<li>
							<a href="#"><img src="<?php echo get_template_directory_uri() . "/image/" ?>linked-in.png"></a>
						</li>
					</ul>
				</div>
				<div class="footer-right-lower">
					<span class="footer-border-red">
						<h3>Get the App:</h3>
					</span>
					<ul>
						<li>
							<a href="#"><img src="<?php echo get_template_directory_uri() . "/image/" ?>andriod-logo.png"></a>
						</li>
						<li>
							<a href="#"><img src="<?php echo get_template_directory_uri() . "/image/" ?>apple.png"></a>
						</li>
					</ul>
				</div>
			</div>

			<div class="footer-copyright">
				<div class="copyright-text">
					<footer id="footer" role="contentinfo">
						<div id="copyright">
							&copy; <?php echo esc_html(date_i18n(__('Y', 'blankslate'))); ?> <?php echo esc_html(get_bloginfo('name')); ?>
						</div>
					</footer>
				</div>
			</div>
		</div>
	</div>
</body>

</html>