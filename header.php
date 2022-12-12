<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title><?php
        if(is_front_page()) {
            echo wp_title('');
        } elseif (is_page()) {
            echo wp_title(''); echo ' - ';
        } elseif (is_search()) {
            echo 'Busca - ';
        } elseif (!(is_404()) && (is_single()) || (is_page())) {
            wp_title(''); echo ' - ';
        } elseif (is_404()) {
            echo 'Página não encontrada - ';
        } bloginfo('name');
        ?></title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO -->
    <meta name="description" content="<?php bloginfo('name'); ?><?php echo ' - '; ?><?php bloginfo('description'); ?>">
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="<?php bloginfo('name'); ?>"/>
    <meta property="og:description" content="<?php bloginfo('name'); ?><?php echo ' - '; ?><?php bloginfo('description'); ?>"/>
    <meta property="og:url" content="<?php bloginfo('url'); ?>"/>
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/img/logo-header.png"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header id="header">
        <div class="container">
            <a href="<?= get_site_url() ?>"><strong>Logo</strong></a>
            <?php wp_nav_menu(['theme_location' => 'header_menu']) ?>
        </div>
  </header>