<?php
/**
 * Change error msgs
 */
function login_error_msg() { 
    $custom_error_msgs = array(
        '<strong>Cuidado!</strong>: Seu IP ('.$_SERVER['REMOTE_ADDR'].') pode ser bloqueado!',
        '<strong>Opa!</strong>: Algo está errado!',
    );
    return $custom_error_msgs[array_rand($custom_error_msgs)];;
}
add_filter( 'login_errors', 'login_error_msg' );
?>