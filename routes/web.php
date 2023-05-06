<?php


$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/users',['uses' => 'UserController@getUser']); //LISTUSER - show all user records

$router->get('/guser/{id}', 'UserController@getID'); //GETIDUSER - gets user by id

$router->post('/auser', 'UserController@addUser'); //ADDUSER - creates a new user

$router->put('/uuser/{id}', 'UserController@updateUser');  //UPDATEUSER - updates user records with put

$router->patch('/uuser/{id}', 'UserController@updateUser');  //UPDATEUSER - updates user records with patch

$router->delete('/duser/{id}', 'UserController@deleteUser'); //DELETEUSER - delete an existing user