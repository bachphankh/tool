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
    public function getToken(){
        Log::info('received request');
        if (isset($_GET['code'])) {
            Log::info($_GET['code']);
        } else {
            echo "<pre>";
            print_r('vao roi');
            echo "</pre>";
            exit();
//            $client = new \Google_Client();
//            $client->setAuthConfig(storage_path('app/tool/client_secret.json'));
//
//            $client->addScope(Google_Service_Drive::DRIVE);
//
//            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
//            $client->setRedirectUri($redirect_uri);
        }
    }
}