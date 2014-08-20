<?php
/**
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Invisible Assassin
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php global $option_setting; ?>
<div id="top-bar">
	<div class="container">
		<?php if($option_setting['enable-social-icons']) : ?>
		<nav id="site-navigation" class="main-navigation col-md-9 col-sm-12" role="navigation">
		<?php else : ?>
		<nav id="site-navigation" class="main-navigation col-md-12" role="navigation">
		<?php endif; ?>
			<h1 class="menu-toggle"><?php _e( 'Menu', 'invisible-assassin' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'invisible-assassin' ); ?></a>
			
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
		<?php if($option_setting['enable-social-icons']) : ?>
			<div id="social-icons" class="col-md-3 col-sm-12">
				<?php get_template_part('social', 'soshion'); ?>
			</div>
		<?php endif; ?>
	</div><!--.container-->
</div><!--#top-bar-->

<div id="page" class="hfeed site container">
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
		<?php if ( is_array($option_setting['logo'] ) ) : ?>
			<?php if($option_setting['logo']['url'] != ""  ) : ?>
				<div id="site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($option_setting['logo']['url']) ?>"></a>
				</div>
			<?php else : ?>	
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php endif; 
			else : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>				
		 <?php endif; ?>	
		</div>
		
	</header><!-- #masthead -->

	<?php get_template_part('slider') ?>
	
	<div id="content" class="site-content">