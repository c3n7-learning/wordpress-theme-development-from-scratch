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

    // ========================================================
    // Hero section
    // ========================================================
    $wp_customize->add_section('sec_hero', [
        'title' => 'Hero Settings',
    ]);

    // Title
    $wp_customize->add_setting('set_hero_title', [
        'type' => 'theme_mod',
        'default' => 'Please, add some title.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('set_hero_title', [
        'label' => 'Hero Title',
        'description' => 'Please type your title here',
        'section' => 'sec_hero',
        'type' => 'text',
    ]);


    // Sub Title
    $wp_customize->add_setting('set_hero_subtitle', [
        'type' => 'theme_mod',
        'default' => 'Please, add some subtitle.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('set_hero_subtitle', [
        'label' => 'Hero Subtitle',
        'description' => 'Please type your subtitle here',
        'section' => 'sec_hero',
        'type' => 'textarea',
    ]);

    // Button Text
    $wp_customize->add_setting('set_hero_button_text', [
        'type' => 'theme_mod',
        'default' => 'Learn more',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('set_hero_button_text', [
        'label' => 'Hero button text',
        'description' => 'Please type your button text here',
        'section' => 'sec_hero',
        'type' => 'text',
    ]);

    // Button Link
    $wp_customize->add_setting('set_hero_button_link', [
        'type' => 'theme_mod',
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('set_hero_button_link', [
        'label' => 'Hero button link',
        'description' => 'Please type your button link here',
        'section' => 'sec_hero',
        'type' => 'url',
    ]);

    // Hero Height
    $wp_customize->add_setting('set_hero_height', [
        'type' => 'theme_mod',
        'default' => 800,
        'sanitize_callback' => 'absint',
    ]);

    $wp_customize->add_control('set_hero_height', [
        'label' => 'Hero height',
        'description' => 'Please type your hero height',
        'section' => 'sec_hero',
        'type' => 'number',
    ]);

    // Hero Background
    $wp_customize->add_setting('set_hero_background', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'absint', // We get an id of the media in the DB
    ]);

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'set_hero_background', [
        'label' => 'Hero Image',
        'section' => 'sec_hero',
        'mime_type' => 'image',
    ]));
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

}

add_action('customize_register', 'wpdevs_customizer');
