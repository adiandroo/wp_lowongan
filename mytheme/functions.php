<?php

// load stylesheets
function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');
}
add_action('wp_enqueue_scripts', 'load_css');

// load javascript
function load_js()
{
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');

// theme options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');

// menus
register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        'footer-menu' => 'Footer Menu Location',
    )
);

// custom image sizes
add_image_size('blog-large', 800, 600, true);
add_image_size('blog-small', 300, 200, true);

// register sidebars
function my_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );
}
add_action('widgets_init', 'my_sidebars');

function my_first_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Jobs',
            'singular_name' => "Job",
        ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        // 'rewrite' => array('slug' => 'Job'),
    );
    register_post_type('jobs', $args);
}
add_action('init', 'my_first_post_type');

function my_first_taxonomy()
{
    $args = array(
        'labels' => array(
            'name' => 'Brands',
            'singular_name' => 'Brand',
        ),
        'public' => true,
        'hierarchical' => true,
    );
    register_taxonomy('brands', array('jobs'), $args);
}
add_action('init', 'my_first_taxonomy');

add_action('wp_ajax_enquiry', 'enquiry_form');
add_action('wp_ajax_nopriv_enquiry', 'enquiry_form');
function enquiry_form()
{
    $formdata = [];
    wp_parse_str($_POST['enquiry'], $formdata);
    // admin email
    $headers[] = 'Content-Type:text/html; charset=UTF-8';
    $headers[] = 'From' . $admin_email;
    $headers[] = 'Reply-to:' . $formdata['email'];
    // target sender
    $send_to = $admin_email;
    // subject
    $subject = "Enquiry from " . $formdata['fname'] . ' ' . $formdata['lname'];
    // message
    $message = '';
    foreach ($formdata as $index => $field) {
        $message .= '<strong>' . $index . '</strong>: ' . $field . '<br />';
    }
    try {
        if (wp_mail($send_to, $subject, $message, $headers)) {
            wp_send_json_success('Email sent!');
        } else {
            wp_send_json_error('Email error');
        }
    } catch (Exception $e) {
        wp_send_json_error($e->getMessage());
    }
    wp_send_json_success($formdata['fname']);
}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

add_action('phpmailer_init', 'custom_mailer');
function custom_mailer(PHPMailer $phpmailer)
{
    $phpmailer->SetFrom('antonieandoro@gmail.com', 'Adi');
    $phpmailer->Host = 'email-smtp.ud-west-2.amazonaws.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Username = 'Yeah';
    $phpmailer->Password = 'asmlkask';
    $phpmailer->IsSMTP();
}

function my_shortcode($atts, $content = null, $tag = '')
{
    ob_start();
    set_query_var('attributes', $atts);
    get_template_part('includes/latest', 'jobs');
    return ob_get_clean();
}
add_shortcode('latest_jobs', 'my_shortcode');

function my_phone()
{
    return '<a href="tel:021-88999990">021-88999990</a>';
}
add_shortcode('phone', 'my_phone');
