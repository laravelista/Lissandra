<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Response;

$app->get('/', function() {
    return response('Redirecting to Repository on GitHub...', Response::HTTP_TEMPORARY_REDIRECT)
        ->header('location', 'https://github.com/laravelista/Lissandra');
});

$app->get('api/v1/feed/lessons', 'App\Http\Controllers\FeedController@lessons');
