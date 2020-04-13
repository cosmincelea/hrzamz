<?php

namespace OpenAPIServer\Api;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;

include_once "config.php";


class AuthMiddleware
{

    /**
     * Example middleware invokable class
     *
     * @param  ServerRequestInterface  $request PSR-7 request
     * @param  RequestHandlerInterface $handler PSR-15 request handler
     *
     * @return Response
     */
    public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {

        if (!$request->hasHeader('ApiKey')) {
            $response = new Response();

            $response->getBody()->write('{
              "reasonCode": "MissingAuth",
              "message": "Api key is missing from request"
            }');
            $response->withStatus(401);
            return $response->withStatus(401)->withHeader('Content-Type', 'application/json');

        }

        $api_key = $request->getHeader('ApiKey')[0];
        $config = new Config();

        if (in_array($api_key, $config->static_api_key)) {
            $response = $handler->handle($request);
            return $response;
        }

        $response = new Response();
        $response->getBody()->write('{
              "reasonCode": "WrongAuth",
              "message": "Api key is not correct"
            }');
        $response->withStatus(401);
        return $response->withStatus(401)->withHeader('Content-Type', 'application/json');
    }
}
