<?php

// https://developer.wordpress.org/themes/customize-api/customizer-objects/
// Santization Examples
// https://divpusher.com/blog/wordpress-customizer-sanitization-examples/
//
// Kirki, for more controls

/** @param WP_Customize_Manager $wp_customize */
function wpdevs_customizer($wp_customize)
{
    // ========================================================
    // Copyright section
    // ========================================================
    $wp_customize->add_section('sec_copyright', [
        'title' => __('Copyright Settings', 'wp-devs'),
        'description' => __('Your copyright settings', 'wp-devs'),
    ]);

    $wp_customize->add_setting('set_copyright', [
        'type' => 'theme_mod',
        'default' => __('Copyright X - All Rights Reserved', 'wp-devs'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('set_copyright', [
        'label' => __('Copyright Information', 'wp-devs'),
        'description' => __('Please type your copyright here', 'wp-devs'),
        'section' => 'sec_copyright',
        'type' => 'text',
    ]);
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    // ========================================================
    // Hero section
    // ========================================================
    $wp_customize->add_section('sec_hero', [
        'title' => __('Hero Settings', 'wp-devs'),
    ]);

    // Title
    $wp_customize->add_setting('set_hero_title', [
        'type' => 'theme_mod',
        'default' => __('Please, add some title.', 'wp-devs'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('set_hero_title', [
        'label' => __('Hero Title', 'wp-devs'),
        'description' => __('Please type your title here', 'wp-devs'),
        'section' => 'sec_hero',
        'type' => 'text',
    ]);


    // Sub Title
    $wp_customize->add_setting('set_hero_subtitle', [
        'type' => 'theme_mod',
        'default' => __('Please, add some subtitle.', 'wp-devs'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('set_hero_subtitle', [
        'label' => __('Hero Subtitle', 'wp-devs'),
        'description' => __('Please type your subtitle here', 'wp-devs'),
        'section' => 'sec_hero',
        'type' => 'textarea',
    ]);

    // Button Text
    $wp_customize->add_setting('set_hero_button_text', [
        'type' => 'theme_mod',
        'default' => __('Learn more', 'wp-devs'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('set_hero_button_text', [
        'label' => __('Hero button text', 'wp-devs'),
        'description' => __('Please type your button text here', 'wp-devs'),
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
        'label' => __('Hero button link', 'wp-devs'),
        'description' => __('Please type your button link here', 'wp-devs'),
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
        'label' => __('Hero height', 'wp-devs'),
        'description' => __('Please type your hero height', 'wp-devs'),
        'section' => 'sec_hero',
        'type' => 'number',
    ]);

    // Hero Background
    $wp_customize->add_setting('set_hero_background', [
        'type' => 'theme_mod',
        'sanitize_callback' => 'absint', // We get an id of the media in the DB
    ]);

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'set_hero_background', [
        'label' => __('Hero Image', 'wp-devs'),
        'section' => 'sec_hero',
        'mime_type' => 'image',
    ]));
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


    // ========================================================
    // Blog
    // ========================================================
    $wp_customize->add_section(
        'sec_blog',
        array(
            'title' => __('Blog Section', 'wp-devs'),
        )
    );

    // Posts per page
    $wp_customize->add_setting(
        'set_per_page',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'absint'
        )
    );

    $wp_customize->add_control(
        'set_per_page',
        array(
            'label' => __('Posts per page', 'wp-devs'),
            'description' => __('How many items to display in the post list?', 'wp-devs'),
            'section' => 'sec_blog',
            'type' => 'number'
        )
    );

    // Post categories to include
    $wp_customize->add_setting(
        'set_category_include',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_category_include',
        array(
            'label' => __('Post categories to include', 'wp-devs'),
            'description' => __('Comma separated values or single category ID', 'wp-devs'),
            'section' => 'sec_blog',
            'type' => 'text'
        )
    );

    // Post categories to exclude
    $wp_customize->add_setting(
        'set_category_exclude',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'set_category_exclude',
        array(
            'label' => __('Post categories to exclude', 'wp-devs'),
            'description' => __('Comma separated values or single category ID', 'wp-devs'),
            'section' => 'sec_blog',
            'type' => 'text'
        )
    );
    // \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
}

add_action('customize_register', 'wpdevs_customizer');
