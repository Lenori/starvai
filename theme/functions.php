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

add_action('admin_menu', 'projetos_starvai_menu');

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

    $projetos = $wpdb->get_results("SELECT * FROM  wp_projetos WHERE id = '$id'");
    return $projetos;

}

add_action('rest_api_init', function () {
    register_rest_route( 'wp/v2', '/projetos/(?P<id>\d+)', array(
        'methods' => 'GET',
        'callback' => 'starvai_projetos_one',
    ) );
});