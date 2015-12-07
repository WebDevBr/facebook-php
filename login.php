<?php

require 'bootstrap.php';

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email']; //permissões do usuario
$loginUrl = $helper->getLoginUrl('http://localhost:8000/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
