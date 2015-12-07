<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/ids.php';

session_start();

//se usuario está logado
    //exibo os dados desse usuário
//senão
    //se eu ja tenho $_GET['code'] e $_GET['state']
        //então eu armazeno o access token
    //se não eu crio o link de login

try {
    $fb = new WebDevBr\Facebook\Facebook($app_id, $app_secret);

    if (!empty($_SESSION['facebook_access_token'])) {
        echo '<pre>';
        var_dump($user = $fb->User()->get($_SESSION['facebook_access_token']));
        var_dump($user->getName());
    } else {
        if (!empty($_GET['code']) and !empty($_GET['state'])) {
            $_SESSION['facebook_access_token'] = $fb->Login()->getAccessToken();
            header('location: /class_example.php');
        } else {
            $url = $fb->Login()->url('http://localhost:8000/class_example.php');
            echo '<a href="'.$url.'">Face log in</a>';
        }
    }
} catch (Exception $e) {
    echo 'Deu zica: '.$e->getMessage();
}

/**
 * Caso não goste de métodos mágicos:
 *
 * $fb = new WebDevBr\Facebook\Facebook($app_id, $app_secret);
 * $user = new WebDevBr\Facebook\Actions\User($fb);
 * $user->get();
 */
