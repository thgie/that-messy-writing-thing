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

$app->get('/', 'BaseController@home');
$app->get('/p/{id}', 'BaseController@p');
$app->post('/', 'BaseController@save');
$app->post('/bootstrap', 'BaseController@bootstrap');
$app->post('/chain', 'BaseController@chain');
$app->post('/new', 'BaseController@addnew');
