<?php

require 'vendor/autoload.php';

use \App\Services\Api;

header('Content-Type: application/json');

if (isset($_GET['url']) && !empty($_GET['url'])) {
  $url = urldecode($_GET['url']);

  if (isset($_GET['selector']) && !empty($_GET['selector'])) {
    $selector = $_GET['selector'];
  }


  try {

    $imgUrl = Api::generateImage($url, $selector);

    if ($imgUrl['data'] === null) {
      throw new Exception('invalid params');
    }
    echo json_encode($imgUrl);
  } catch (Exception $e) {
    echo json_encode(array('error' => $e->getMessage()));
  }
} else {
  echo json_encode(array(
    'status' => 'error',
    'data' => 'Envie a URL que será renderizada'
  ));
}
