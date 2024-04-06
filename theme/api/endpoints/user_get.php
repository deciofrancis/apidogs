<?php 

function api_user_get($request) {

    $user = wp_get_current_user();
    $user_id = $user->ID;

    if($user_id === 0) {
        $response = new WP_Error('error', 'Usuario nao possui permissao', ['status' => 401]);
        return rest_ensure_response($response);
    }

    $response = [
        'id' => $user_id,
        'username' => $user->user_login,
        'nome' => $user->display_name,
        'email' => $user->user_email,
    ];

    return rest_ensure_response($response);
}

function register_api_user_post() {
    register_rest_route('api', '/user', [
        'methods' => WP_REST_Server::CREATABLE,
        'callback' => 'api_user_post',
    ]);
}

add_action('rest_api_init', 'register_api_user_post');

?>