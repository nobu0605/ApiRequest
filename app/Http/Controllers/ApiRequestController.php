<?php

namespace App\Http\Controllers;

use \GuzzleHttp\Client;

class ApiRequestController extends Controller
{

    public function action_index()
    {

        $client = new Client();

        $base_url = 'https://labs.goo.ne.jp/api/hiragana';
        $options = [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'sentence' => 'ひらがな',
                'app_id' => 'e92fd7b7754298d501523c2b4612275e854677a8adbf3b4184ff173464297afc',
                'output_type' => 'hiragana',
            ]
        ];

        $response = $client->request(
            'POST',
            $base_url,
            $options
        );

        $response_body = (string) $response->getBody();
        echo $response_body;
    }
}
