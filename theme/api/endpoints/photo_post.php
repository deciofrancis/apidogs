<?php 

function api_photo_post($request) {
    $user = wp_get_current_user();
    $user_id = $iser->ID;

    if($user_id === 0) {
        $response = new WP_Error('error', 'Usuario nao possui permissao.', ['status' => 401]);
        return rest_ensure_response($response);
    }

    return rest_ensure_response($response);
}

function register_api_photo_post() {
    register_rest_route('api', '/photo', [
        'methods' => WP_REST_Server::CREATABLE,
        'callback' => 'api_photo_post',
    ]);
}

add_action('rest_api_init', 'register_api_photo_post');

?>