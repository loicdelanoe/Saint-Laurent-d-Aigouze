<?php

require_once(get_template_directory() . '/inc/helpers.php');

// Disable Gutenberg editor
add_filter('use_block_editor_for_post', '__return_false');

// Enregistrer des menus de navigation :
register_nav_menu('main', 'Navigation principale, en-tête du site');
register_nav_menu('footer', 'Navigation de pied de page');
