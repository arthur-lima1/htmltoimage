<?php

require 'vendor/autoload.php';

use \App\Services\Api;
use \App\Common\Environment;

header('Content-Type: application/json');


/**
 * Verifica se enviou o parâmetro URL
 */
if (isset($_GET['url']) && !empty($_GET['url'])) {
  $url = urldecode($_GET['url']);

  /**
   * Verifica se enviou o parâmetro selector
   */
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
    echo json_encode(array(
      'status' => 'error',
      'data' => $e->getMessage()
    ));
  }
} else {
  echo json_encode(array(
    'status' => 'error',
    'data' => 'Envie a URL que será renderizada'
  ));

  // Environment::load(__DIR__);
  echo json_encode(getenv());
  putenv('TESTE=UE AQUI PEGOU');
  echo json_encode(getenv('TESTE'));

  
}
