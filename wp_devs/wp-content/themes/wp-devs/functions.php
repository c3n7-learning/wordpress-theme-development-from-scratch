<?php

function wpdevs_load_scripts()
{
    wp_enqueue_style('wpdevs-style', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap', [], null);
    wp_enqueue_script('dropdown', get_template_directory_uri() . "/js/dropdown.js", [], '1.0', true);
}

add_action('wp_enqueue_scripts', 'wpdevs_load_scripts');

register_nav_menus(
    [
        'wp_devs_main_menu' => 'Main Menu',
        'wp_devs_footer_menu' => 'Footer Menu',
    ]
);
