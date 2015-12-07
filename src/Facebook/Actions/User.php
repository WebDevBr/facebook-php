<?php

namespace WebDevBr\Facebook\Actions;

use WebDevBr\Facebook\Facebook;

class User
{
    public function __construct(Facebook $fb)
    {
        $this->fb = $fb->getInstance();
    }

    public function get($access_token)
    {
        $this->fb->setDefaultAccessToken($access_token);

        $response = $this->fb->get('/me');
        return $response->getGraphUser();
    }
}
