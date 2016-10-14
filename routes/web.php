<?php

use App\User;
use App\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {

    $user = User::findOrFail(1);

    $post = new Post(['title' => 'My Second PHP post', 'body' => 'I love Laravel 2']);

    $user->posts()->save($post);

});

Route::get('/read', function () {

    $user = User::findOrFail(1);

    foreach ($user->posts as $post) {

        echo $post->title . "<br>";

    }

});

Route::get('/update', function () {

    $user = User::findOrFail(1);

    $user->posts()->whereId(1)->update(['title' => 'I love Laravel and React', 'body' => 'This is awesome PHP and ReactJS.']);

});

Route::get('/delete', function () {

    $user = User::findOrFail(1);

    $user->posts()->whereId(2)->delete();

});
