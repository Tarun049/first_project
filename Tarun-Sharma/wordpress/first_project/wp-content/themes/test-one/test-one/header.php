<!DOCTYPE html>
<html>

<head>
	<title>Qidz-responsive</title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . "/css/qidz-responsive.css"; ?>">
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="main">
		<div class="header">
			<div class="header-upper">
				<div class="header-upper-logo">
					<ul>
						<li>
							<div id="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
								<?php
								if (is_front_page() || is_home() || is_front_page() && is_home()) {
									echo '<h1>';
								}
								echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" rel="home" itemprop="url"><span itemprop="name">' . esc_html(get_bloginfo('name')) . '</span></a>';
								if (is_front_page() || is_home() || is_front_page() && is_home()) {
									echo '</h1>';
								}
								?>
							</div>
						</li>
						<li><a href="#"> <img src="<?php echo get_template_directory_uri() . "/image/" ?>apple.png"></a></li>
						<li><a href="#"> <img src="<?php echo get_template_directory_uri() . "/image/" ?>andriod-logo.png"></a></li>
					</ul>
				</div>
				<div class="header-upper-text">
					<ul>
						<li><a href="#"> Login/register</a> |</li>
						<li><a href="#"> Partner With Us</a></li>
						<li>
							<select class="hedader-select">
								<option>Select city</option>
								<option>Indore</option>
								<option>Bhopal</option>
								<option>Jabalpur</option>
								<option>Ratlam</option>
								<option>Dhar</option>
							</select>
						</li>
						<li>
							<select>
								<option>English</option>
								<option>Hindi</option>
								<option>Mrathi</option>
							</select>
						</li>
					</ul>
				</div>
			</div>
			<div class="header-lower">
				<div class="header-lower-logo">
					<img src="<?php echo get_template_directory_uri() . "/image/" ?>qidz-logo.png">
				</div>
				<div class="header-lower-text">
					<ul>
						<li><img src="<?php echo get_template_directory_uri() . "/image/" ?>download.png"><a href="#">Download</a></li>
						<li><img src="<?php echo get_template_directory_uri() . "/image/" ?>blog.png"><a href="#">Our Blog</a></li>
						<li><img src="<?php echo get_template_directory_uri() . "/image/" ?>alert.png"><a href="#">Alerts</a></li>
					</ul>
				</div>
			</div>
			<?php
			// code to show the menu in front-end
			if (has_nav_menu("primary-menu")) { // if true
				wp_nav_menu( //wp function to show the menu of given id
					array(
						'theme_location'    => 'primary-menu',
						'menu_id'           => 'test_one_primary_menu',
						'class'             => 'menu',
					)
				);
			}
			?>
		</div>
	</div>
</body>

</html>