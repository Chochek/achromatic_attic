<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="Achromatic Attic" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="http://achromaticattic.com" />
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/band-image.png" />

  <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
</head>
