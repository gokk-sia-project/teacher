<?php


$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/users',['uses' => 'UserController@getUser']); //LISTUSER

$router->get('/guser/{id}', 'UserController@getID'); //GETIDUSER

$router->post('/auser', 'UserController@addUser'); //ADDUSER

$router->put('/uuser/{id}', 'UserController@updateUser');  //UPDATEUSER

$router->delete('/duser/{id}', 'UserController@deleteUser'); //DELETEUSER