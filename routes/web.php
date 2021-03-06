<?php

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

$router->get('/users/{name}/games', ['as' => 'user-games', function ($name) {
    $user = App\User::whereName($name)->first();

    if (empty($user)) {
        list($payload, $status) = [['error' => 'Not Found'], 404];
    } else {
        if (empty($user->games)) {
            list($payload, $status) = [['error' => 'Not Found'], 404];
        } else {
            list($payload, $status) = [['data' => $user->games], 200];
        }
    }

    return response()->json($payload, $status);
}]);

$router->get('/users/{name}/games/{hash}', ['as' => 'user-game', function ($hash) {
    $id = app('hashids')->decode($hash);
    $game = App\Game::find($id);

    if (empty($game)) {
        list($payload, $status) = [['error' => 'Not Found'], 404];
    } else {
        list($payload, $status) = [['data' => $game], 200];
    }

    return response()->json($payload, $status);
}]);

$router->get('/users', function () {
    $users = App\User::all();

    if (empty($users)) {
        list($payload, $status) = [['error' => 'Not Found'], 404];
    } else {
        list($payload, $status) = [['data' => $users], 200];
    }

    return response()->json($payload, $status);
});

$router->get('/users/{name}', ['as' => 'user', function ($name) {
    $user = App\User::whereName($name)->first();

    if (empty($user)) {
        list($payload, $status) = [['error' => 'Not Found'], 404];
    } else {
        list($payload, $status) = [['data' => $user], 200];
    }

    return response()->json($payload, $status);
}]);
