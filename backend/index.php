<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);


$app->get('/', function (Request $request, Response $response, array $args) {

    $response->getBody()->write("Hello");

    return $response;
});

$app->get('/debug', function (Request $request, Response $response, array $args) {

    $response->getBody()->write("Hello debug");

    return $response;
});

(require __DIR__ . '/routes/users.php')($app);

$app->run();
