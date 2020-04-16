<?php

/**
 * STARVAI MENUS
 * Arquivos e funções para os menus da Starvai
 */

function projetos_starvai_menu() {

    add_menu_page(
        'Starvai Projetos',
        'Starvai Projetos',
        'manage_options',
        'starvai_projetos',
        'starvai_projetos',
        'dashicons-admin-settings',
        6);

}

function starvai_projetos() {

    include('menus/projetos/starvai-projetos.php');

}

function starvai_projetos_submenu() {

    add_submenu_page(
        'starvai_projetos',
        'Opções dos projetos',
        'Opções dos projetos',
        'manage_options',
        'opcoes_projetos',
        'starvai_projetos_sub');

}

function starvai_projetos_sub() {

    include('menus/projetos/starvai-opcoes.php');

}

add_action('admin_menu', 'projetos_starvai_menu');
add_action('admin_menu', 'starvai_projetos_submenu');

function faq_starvai_menu() {

    add_menu_page(
        'Starvai FAQ',
        'Starvai FAQ',
        'manage_options',
        'starvai_faq',
        'starvai_faq',
        'dashicons-admin-settings',
        6);

}

function starvai_faq() {

    include('menus/faq/starvai-faq.php');

}

add_action('admin_menu', 'faq_starvai_menu');

function depoimento_starvai_menu() {

    add_menu_page(
        'Starvai Depoimentos',
        'Starvai Depoimentos',
        'manage_options',
        'starvai_depoimentos',
        'starvai_depoimentos',
        'dashicons-admin-settings',
        6);

}

function starvai_depoimentos() {

    include('menus/depoimentos/starvai-depoimentos.php');

}

add_action('admin_menu', 'depoimento_starvai_menu');

function etapas_starvai_menu() {

    add_menu_page(
        'Starvai Etapas',
        'Starvai Etapas',
        'manage_options',
        'starvai_etapas',
        'starvai_etapas',
        'dashicons-admin-settings',
        6);

}

function starvai_etapas() {

    include('menus/etapas/starvai-etapas.php');

}

add_action('admin_menu', 'etapas_starvai_menu');

function slider_starvai_menu() {

    add_menu_page(
        'Starvai Slider',
        'Starvai Slider',
        'manage_options',
        'starvai_slider',
        'starvai_slider',
        'dashicons-admin-settings',
        6);

}

function starvai_slider() {

    include('menus/slider/starvai-slider.php');

}

add_action('admin_menu', 'slider_starvai_menu');

/**
 * STARVAI API
 * Endpoints customizados para a API
 */

function starvai_projetos_all() {

    global $wpdb;

    $response = [];

    $projetos = $wpdb->get_results('SELECT * FROM  wp_projetos');

    foreach ($projetos as $proj) {

        $projeto = new stdClass();

        $projeto->id = $proj->id;
        $projeto->title = $proj->title;
        $projeto->slug = $proj->slug;
        $projeto->resume = $proj->resume;
        $projeto->img = $proj->img;

        $projeto->opcoes = $wpdb->get_results("SELECT a.title, b.opcao FROM wp_projetos_opcoes AS a INNER JOIN wp_opcoes_selecionadas AS b ON a.id = b.opcao WHERE b.projeto = '$proj->id'");

        $response[] = $projeto;

    }

    return $response;

}

add_action('rest_api_init', function () {
    register_rest_route( 'wp/v2', '/projetos', array(
        'methods' => 'GET',
        'callback' => 'starvai_projetos_all',
    ) );
});

function starvai_projetos_one($data) {

    global $wpdb;
    $id = $data['id'];

    $response = [];

    $response[] = $wpdb->get_results("SELECT * FROM  wp_projetos WHERE id = '$id'");
    $response[] = $wpdb->get_results("SELECT a.title, b.opcao FROM wp_projetos_opcoes AS a INNER JOIN wp_opcoes_selecionadas AS b ON a.id = b.opcao WHERE b.projeto = '$id'");

    return $response;

}

add_action('rest_api_init', function () {
    register_rest_route( 'wp/v2', '/projetos/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'starvai_projetos_one',
    ) );
});

function starvai_faq_all() {

    global $wpdb;

    $faq = $wpdb->get_results("SELECT * FROM  wp_faq");
    return $faq;

}

add_action('rest_api_init', function () {
    register_rest_route( 'wp/v2', '/faq', array(
        'methods' => 'GET',
        'callback' => 'starvai_faq_all',
    ) );
});

function starvai_depoimentos_all() {

    global $wpdb;

    $faq = $wpdb->get_results("SELECT * FROM  wp_depoimentos");
    return $faq;

}

add_action('rest_api_init', function () {
    register_rest_route( 'wp/v2', '/depoimentos', array(
        'methods' => 'GET',
        'callback' => 'starvai_depoimentos_all',
    ) );
});

function post_view_counter_function($data) {

    global $wpdb;
    $id = $data['id'];

    if (metadata_exists('post', $id, 'views')) {

        $current_views = get_post_meta($id, 'views', true);
        $views = $current_views + 1;
        update_post_meta($id, 'views', $views);

    } else {

        add_post_meta($id, 'views', 1);

    }

}

add_action('rest_api_init', function () {
    register_rest_route( 'wp/v2', '/page_view/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'post_view_counter_function',
    ) );
});

function starvai_populares() {

    $args = array(
        'post_status' => 'publish',
        'posts_per_page' => '3',
        'meta_key' => 'views',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
    );

    $posts = array();

    $query = new WP_Query($args);

    while ($query->have_posts()) : $query->the_post();
        array_push($posts, get_the_ID());
    endwhile;

    return $posts;

}

add_action('rest_api_init', function () {
    register_rest_route( 'wp/v2', '/populares', array(
        'methods' => 'GET',
        'callback' => 'starvai_populares',
    ) );
});

function starvai_etapas_all() {

    global $wpdb;

    $faq = $wpdb->get_results("SELECT * FROM  wp_etapas");
    return $faq;

}

add_action('rest_api_init', function () {
    register_rest_route( 'wp/v2', '/etapas', array(
        'methods' => 'GET',
        'callback' => 'starvai_etapas_all',
    ) );
});

function starvai_slider_all() {

    global $wpdb;

    $faq = $wpdb->get_results("SELECT * FROM  wp_slider");
    return $faq;

}

add_action('rest_api_init', function () {
    register_rest_route( 'wp/v2', '/slider', array(
        'methods' => 'GET',
        'callback' => 'starvai_slider_all',
    ) );
});

add_theme_support( 'post-thumbnails' );

function add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','add_cors_http_header');
