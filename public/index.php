<?php

//bringing in the request and response needed.
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
//include the database connection file.
require '../config/db.php';

$app = new \Slim\App;
//creating the route for the get request.
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

// Beer Routes
require '../routes/beer.php';

$app->run();