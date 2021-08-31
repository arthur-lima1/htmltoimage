<?php

require 'vendor/autoload.php';
use \App\service\API;

header('Content-Type: application/json');
$imgUrl="";

if(isset($_GET['url']) && strlen($_GET['url']) > 0){
  $url = $_GET['url'];

      
  
  echo json_encode(array('stage'=>'recebimento da url', 'url'=> $url));
  try{
  echo json_encode(array('stage'=>'dentro do try', 'url'=>$url));
  $imgUrl = API::generateImage($url);
  echo json_encode(array('stage'=>'após a execução do service', 'url'=>$url, 'imgUrl'=>$imgUrl));
} catch(\Exception $e){
  echo json_encode($e->getMessage());
}


  

}
else{
  echo json_encode("insira uma URL");

}

?>
