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

        $base_url = '：http://example.com/';
        $options = [
            'form_params' => [
                'image_path' => $image_path
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
            $response_body = (string) $response->getBody();
            $response_body = json_decode($response_body, true);

            if ($response_body['message'] == false) {
                throw new Exception();
            }
        } catch (Exception $e) {
            return view(
                '/index',
                ['error_message' => 'エラーが発生しました。DBにデータが保存されませんでした。']
            );
        }

        $param = [
            'image_path' => $image_path,
            'success' => $response_body['success'],
            'message' => $response_body['message'],
            'class' => $response_body['estimated_data']['class'],
            'confidence' => $response_body['estimated_data']['confidence'],
            'request_timestamp' => $request_timestamp,
            'response_timestamp' => $response_timestamp,
        ];

        Ai_analysis_log::insert([$param]);

        return view(
            '/index',
            ['success' => 'DBにデータが保存されました。']
        );
    }
}
