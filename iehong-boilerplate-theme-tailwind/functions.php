<?php

function load_assets()
{
    wp_enqueue_script('main', get_theme_file_uri('/build/index.js'), array('jquery', 'wp-element'), '1.0', true);
    wp_enqueue_style('main', get_theme_file_uri('/build/index.css'));
}

add_action('wp_enqueue_scripts', 'load_assets');

add_filter('show_admin_bar', '__return_false');

// 关闭评论功能
function disable_comments()
{
    // 禁用评论功能
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
    // 移除评论菜单
    remove_menu_page('edit-comments.php');
    // 隐藏评论设置
    remove_submenu_page('options-general.php', 'options-discussion.php');
}
add_action('admin_init', 'disable_comments');

// 去除 wpadminbar 中的评论链接
function remove_adminbar_comments()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'remove_adminbar_comments');
function custom_admin_footer_text($content)
{
    $content = 'Theme By <a href="https://iehong.fun" target="_blank">Iehong</a>';
    return $content;
}
add_filter('admin_footer_text', 'custom_admin_footer_text');
