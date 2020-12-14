<?php
declare(strict_types=1);

use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Routing\RouteContext;
use Slim\Exception\HttpNotFoundException;


return function (App $app) {
    $container = $app->getContainer();

    $app->addBodyParsingMiddleware();

    $app->options('/{routes:.+}', function ($request, $response, $args) {
        return $response;
    });

    $app->get('/', 'HomePageController');
    $app->put('/markAsComplete/{id}', 'MarkAsCompleteController');
    $app->post('/addNewTask', 'AddNewTaskController');


    $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
        throw new HttpNotFoundException($request);
    });

};
