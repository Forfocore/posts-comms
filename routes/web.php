<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('posts', 'PostController@showAll');

$router->post('post/add', 'PostController@add');
$router->post('post/{post_id}/edit', 'PostController@edit');
$router->get('post/{post_id}', 'PostController@show');
$router->delete('post/{post_id}/delete', 'PostController@delete');

$router->post('post/{post_id}/comment/add', 'CommentController@add');
$router->delete('comment/{comment_id}/delete', 'CommentController@delete');
