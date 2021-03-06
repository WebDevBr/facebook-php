<?php

require 'bootstrap.php';

if (isset($_SESSION['facebook_access_token'])) {
    $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

    try {
        $response = $fb->get('/me');
        $userNode = $response->getGraphUser();
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
      // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
      // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    echo '<pre>';
    var_dump($userNode->getEmail());

    echo 'Logged in as ' . $userNode->getName();
} else {
    header('location: login.php');
}
