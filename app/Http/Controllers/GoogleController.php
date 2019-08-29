<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 8/29/2019
 * Time: 1:52 PM
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
class GoogleController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function getToken(){
        Log::info('received request');

            $client = new \Google_Client();
            $client->setAuthConfig(storage_path('app/tool/client_secret.json'));

            $client->addScope('https://www.googleapis.com/auth/androidpublisher');

            $redirect_uri = 'https://test.t4code.art/g_token';
            $client->setRedirectUri($redirect_uri);

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token);
            // store in the session also
            $_SESSION['upload_token'] = $token;

        }
// set the access token as part of the client
        if (!empty($_SESSION['upload_token'])) {
            echo "<pre>";
            print_r($_SESSION['upload_token']);
            echo "</pre>";
            exit();
//            $client->setAccessToken($_SESSION['upload_token']);
//            if ($client->isAccessTokenExpired()) {
//                unset($_SESSION['upload_token']);
//            }
        } else {
            $authUrl = $client->createAuthUrl();
        }

//            $service = new \Google_Service_AndroidPublisher($client);

        $params = [
            'url' => $authUrl
        ];
        return view('google.get_token', $params);

    }
}