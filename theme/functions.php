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

/**
 * STARVAI API
 * Endpoints customizados para a API
 */

function starvai_projetos_all() {

    global $wpdb;

    $projetos = $wpdb->get_results('SELECT * FROM  wp_projetos');
    return $projetos;

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
