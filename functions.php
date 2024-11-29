<?php

add_action("after_setup_theme", function () {
    load_theme_textdomain('mytheme');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menu('topmenu', __('Top Menu','mytheme'));
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

   wp_enqueue_style('featherlight-css','//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.css');
   wp_enqueue_script('fatherlight-js','//cdn.jsdelivr.net/npm/featherlight@1.7.14/release/featherlight.min.js', array('jquery'), '0.0.1', true);
    wp_enqueue_script('main-js',get_theme_file_uri('/assetes/js/main.js'), false, '0.0.1', true);
});



add_action("widgets_init", function () {
    register_sidebar([
        'name' => __('single post sidebar', 'mytheme'),
        'id' => 'sidebar',
        'description' => __('Post sidebar', 'mytheme'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',

    ]);

});

add_theme_support( 'title-tag' );


add_filter("the_excerpt", function ($excerpt){
    if(!post_password_required()){
       return $excerpt;
    }
    else{
        echo get_the_password_form();
    }
});



add_filter("protected_title_format", function (){
    return "%s";
});

function mytheme_menu_css_class ($classes, $item){
    $classes[] = 'nav-link';
    return $classes;
}

add_filter("nav_menu_css_class","mytheme_menu_css_class",10,2);