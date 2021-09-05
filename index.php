<?php

require 'vendor/autoload.php';
use \App\Services\Api;

header('Content-Type: application/json');

if(isset($_GET['url']) && !empty($_GET['url'])){
  $url = urldecode($_GET['url']);

  $imgUrl = Api::generateImage($url, $imgUrl);

  echo json_encode(array('status'=>'Passei da função', 'url'=>$url));

  echo json_encode($imgUrl);

}