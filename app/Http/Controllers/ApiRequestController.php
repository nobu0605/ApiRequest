<?php

namespace App\Http\Controllers;

use \GuzzleHttp\Client;
use App\TranslatedText;
use Illuminate\Http\Request;
use Exception;

class ApiRequestController extends Controller
{
    public function index()
    {
        return view(
            '/index'
        );
    }

    public function apiRequest(Request $request)
    {
        $request->validate(['inputText' => 'max:255|string|filled']);

        $client = new Client();
        $inputText = $request->input('inputText');

        $base_url = 'https://labs.goo.ne.jp/api/hiragana';
        $options = [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'sentence' => $inputText,
                'app_id' => 'e92fd7b7754298d501523c2b4612275e854677a8adbf3b4184ff173464297afc',
                'output_type' => 'hiragana',
            ]
        ];

        try {
            $request_timestamp = time();
            $response = $client->request(
                'POST',
                $base_url,
                $options
            );
            $response_timestamp = time();
        } catch (Exception $e) {
            return view(
                '/index',
                [
                    'error_message' => 'エラーが発生しました。DBにデータが保存されませんでした。'
                ]
            );
        }
        $response_body = (string) $response->getBody();
        $response_body = json_decode($response_body, true);

        $param = [
            'output_type' => $response_body['output_type'],
            'inputText' => $inputText,
            'translatedText' => $response_body['converted'],
            'request_timestamp' => $request_timestamp,
            'response_timestamp' => $response_timestamp,
        ];

        TranslatedText::insert([$param]);

        return view(
            '/index',
            ['success' => 'DBにデータが保存されました。']
        );
    }
}
