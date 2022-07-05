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
