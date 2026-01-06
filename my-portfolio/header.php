<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my-portfolio
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Shilpa Mukherjee - WordPress & Web Developer Portfolio">
<meta name="keywords" content="WordPress Developer, Web Developer, WooCommerce">

<title><?php bloginfo( 'name' ); ?></title>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
    <!-- Hamburger (LEFT) -->
    <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Logo (CENTER) -->
    <div class="logo">
      <span class="logo-s">{S}</span>
      <span class="logo-text">hilpa</span>
      <span class="logo-sweep"></span>
    </div>


    <!-- Spacer (RIGHT – keeps logo centered) -->
    <div class="header-spacer"></div>

    <!-- Menu -->
    <nav class="nav-menu" id="navMenu">
        <?php
        wp_nav_menu([
            'theme_location' => 'menu-1',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'fallback_cb'    => false,
        ]);
        ?>
    </nav>

</header>