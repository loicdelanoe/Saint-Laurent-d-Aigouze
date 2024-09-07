<!doctype html>
<html lang="<?= get_language_attributes() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Loïc Delanoë">
    <meta name="title" content="<?= get_bloginfo('name') ?>">
    <meta name="keywords"
          content="">
    <meta name="description" content="<?= get_bloginfo('description') ?>">
    <!-- Open Graph -->
    <meta property="og:locale" content="fr_FR">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php dw_og_page_title() ?>">
    <meta property="og:url" content="<?= home_url($_SERVER['REQUEST_URI']) ?>">
    <meta property="og:site_name" content="<?= get_bloginfo('name') ?>">
    <!-- Wordpress head -->
    <?php wp_head() ?>
    <!-- Title -->
    <title><?= get_bloginfo('name') ?></title>
</head>
<body itemscope itemtype="https://schema.org/Person">
<a href="#main" class="skip-link">Aller au contenu</a>
<header class="header" id="header" role="banner">
    <h1 class="header__title"><?= get_bloginfo('name') ?></h1>
</header>