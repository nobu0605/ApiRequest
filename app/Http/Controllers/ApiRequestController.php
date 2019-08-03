<?php

namespace App\Http\Controllers;

use \GuzzleHttp\Client;
use App\Ai_analysis_log;
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
        $request->validate(['image_path' => 'max:255|string|filled']);

        $client = new Client();
        $image_path = $request->input('image_path');

        $request_timestamp = time();

        $base_url = 'https://labs.goo.ne.jp/api/hiragana';
        $options = [
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Accept' => 'application/json',
            ],
            'form_params' => [
                'sentence' => $image_path,
                'app_id' => 'e92fd7b7754298d501523c2b4612275e854677a8adbf3b4184ff173464297afc',
                'output_type' => 'hiragana',
            ]
        ];

        try {
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
            'image_path' => $image_path,
            'success' => $response_body['converted'],
            'message' => $response_body['output_type'],
            'class' => $request_timestamp,
            'confidence' => 1,
            'request_timestamp' => $request_timestamp,
            'response_timestamp' => $response_timestamp,
        ];

        Ai_analysis_log::insert([$param]);

        return view(
            '/index',
            [
                'success' => 'DBにデータが保存されました。'
            ]
        );
    }
}
