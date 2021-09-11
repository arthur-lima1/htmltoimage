<?php

namespace App\Services;


class Api
{

    /**
     * Chaves de acesso
     */

    private $user_id;
    private $api_key;

    public function __construct($user_id, $api_key)
    {
        $this->user_id = $user_id;
        $this->api_key = $api_key;
    }

    public function generateImage($url, $selector = '')
    {

        /**
         * Dados que serão enviados para a API
         */

        if (!empty($selector) && strlen($selector) > 0) {
            $data = array('url' => $url, 'selector' => $selector);
        } else {
            $data = array('url' => $url);
        }



        /**
         * Chamada para a API
         */
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://hcti.io/v1/image");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_USERPWD, $this->user_id . ":" . $this->api_key);

        $headers = array();
        $headers[] = "Content-Type: application/x-www-form-urlencoded";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $res = json_decode($result, true);

        return array(
            'status' => 'success',
            'data' => $res['url']
        );
    }
}
