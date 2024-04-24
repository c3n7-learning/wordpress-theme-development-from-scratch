<?php

// https://developer.wordpress.org/themes/customize-api/customizer-objects/
// Santization Examples
// https://divpusher.com/blog/wordpress-customizer-sanitization-examples/

/** @param WP_Customize_Manager $wp_customize */
function wpdevs_customizer($wp_customize)
{
    // ========================================================
    // Copyright section
    // ========================================================
    $wp_customize->add_section('sec_copyright', [
        'title' => 'Copyright Settings',
        'description' => 'Your copyright settings',
    ]);

    $wp_customize->add_setting('set_copyright', [
        'type' => 'theme_mod',
        'default' => 'Copyright X - All Rights Reserved',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('set_copyright', [
        'label' => 'Copyright Information',
        'description' => 'Please type your copyright here',
        'section' => 'sec_copyright',
        'type' => 'text',
    ]);
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
}

add_action('customize_register', 'wpdevs_customizer');
