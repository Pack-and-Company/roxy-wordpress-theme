<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title>
    <?php
      if( ! is_home() ):
        wp_title( '|', true, 'right' );
      endif;
      bloginfo( 'name' );
    ?>
  </title>

  <link type="text/css" rel="stylesheet" media="all" href="css/reset.css" />
  <link type="text/css" rel="stylesheet" media="all" href="css/fonts.css" />
  <link type="text/css" rel="stylesheet" media="all" href="css/style.css" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
