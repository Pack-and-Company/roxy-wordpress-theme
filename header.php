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

  <link type="text/css" rel="stylesheet" media="all" href="<?=get_template_directory_uri();?>/css/reset.css" />
  <link type="text/css" rel="stylesheet" media="all" href="<?=get_template_directory_uri();?>/css/fonts.css" />
  <link type="text/css" rel="stylesheet" media="all" href="<?=get_template_directory_uri();?>/css/style.css" />

  <?php wp_head(); ?>

  <script type="text/javascript" src="<?=get_template_directory_uri();?>/js/jquery.prettyPhoto.js"></script>
  <script type="text/javascript" src="<?=get_template_directory_uri();?>/js/scripts.js"></script>
</head>

<body <?php body_class(); ?>>
