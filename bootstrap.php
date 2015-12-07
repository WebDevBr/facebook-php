<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/ids.php';

$fb = new Facebook\Facebook([
  'app_id' => $app_id,
  'app_secret' => $app_secret,
  'default_graph_version' => 'v2.2',
  ]);

session_start();
