<?php
        
namespace App\service;

class API{

  CONST USER_ID= 'f908fdde-2e58-43ec-8c11-1bd3a786bb78';
  CONST API_KEY= '5c41c08e-acdf-4b58-8a65-744b6db2271b';
  

  public static function generateImage($url){
  echo json_encode(array('state'=>'dentro do service'));    
    $data = array('url'=>$url);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://hcti.io/v1/image");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

    curl_setopt($ch, CURLOPT_POST, 1);
    
    curl_setopt($ch, CURLOPT_USERPWD, self::USER_ID . ":" . self::API_KEY);

    $headers = array();
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
    }
    curl_close ($ch);
    $res = json_decode($result,true);
    return $res['url']; 
    
}

}
