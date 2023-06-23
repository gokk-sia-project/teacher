<?php


$router->get('/', function () use ($router) {
    return $router->app->version();
});


// USER CONTROLLER ROUTES

$router->get('/teachers',['uses' => 'UserController@getUser']); //LISTUSER - show all user records

$router->get('/teacher/{id}', 'UserController@getID'); //GETIDUSER - gets user by id

$router->post('/teacher', 'UserController@addUser'); //ADDUSER - creates a new user

$router->put('/teacher/{id}', 'UserController@updateUser');  //UPDATEUSER - updates user records with put

$router->patch('/teacher/{id}', 'UserController@updateUser');  //UPDATEUSER - updates user records with patch

$router->delete('/teacher/{id}', 'UserController@deleteUser'); //DELETEUSER - delete an existing user


// USER DETAILS CONTROLLER ROUTES

$router->get('/teacherdetails','UserDetailsController@index');

$router->get('/teacherdetails/{id}','UserDetailsController@show');

$router->post('/teacherdetails', 'UserDetailsController@add');


// USER GRADER CONTROLLER ROUTES

$router->get('/grades','UserGraderController@index');

$router->get('/grade/{id}','UserGraderController@show');

$router->post('/addGrade', 'UserGraderController@add');