<?php

/**
 * SlimRouter
 *
 * PHP version 7.1
 *
 * @package OpenAPIServer
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 */

/**
 * Horze Amazon Pay REST API
 *
 * A Restful API that works as a gateaway for Amazon PAY
 * The version of the OpenAPI document: v1.0
 * Generated by: https://github.com/openapitools/openapi-generator.git
 */

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 * Do not edit the class manually.
 */
namespace OpenAPIServer;

use OpenAPIServer\Api\AuthMiddleware;
use OpenAPIServer\Api\CorsMiddleware;
use Slim\Factory\AppFactory;
use Slim\Interfaces\RouteInterface;
use Psr\Container\ContainerInterface;
use InvalidArgumentException;
use OpenAPIServer\Middleware\JsonBodyParserMiddleware;
use Exception;

/**
 * SlimRouter Class Doc Comment
 *
 * @package OpenAPIServer
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 */
class SlimRouter
{

    /** @var App instance */
    private $slimApp;

    /** @var array[] list of all api operations */
    private $operations = [
        [
            'httpMethod' => 'POST',
            'basePathWithoutHost' => '',
            'path' => '/session/new',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractDefaultApi',
            'userClassname' => 'HorzeApi',
            'operationId' => 'sessionNewPost',
            'authMethods' => [
            ],
            'AuthMiddleware' => [
            ],
            'middlewares' => [
            ]
        ],
        [
            'httpMethod' => 'GET',
            'basePathWithoutHost' => '',
            'path' => '/customer',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractDefaultApi',
            'userClassname' => 'HorzeApi',
            'operationId' => 'customerGet',
            'authMethods' => [
            ],
            'middlewares' => [
                "AuthMiddleware"
            ]
        ],
        [
            'httpMethod' => 'GET',
            'basePathWithoutHost' => '',
            'path' => '/',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractDefaultApi',
            'userClassname' => 'HorzeApi',
            'operationId' => 'customerGet',
            'authMethods' => [
            ],
            'middlewares' => [

            ]
        ],
        [
            'httpMethod' => 'POST',
            'basePathWithoutHost' => '',
            'path' => '/order/authorize',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractDefaultApi',
            'userClassname' => 'HorzeApi',
            'operationId' => 'orderAuthorizePost',
            'authMethods' => [
            ],
            'middlewares' => [
                "AuthMiddleware"
            ]
        ],
        [
            'httpMethod' => 'POST',
            'basePathWithoutHost' => '',
            'path' => '/order/capture',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractDefaultApi',
            'userClassname' => 'HorzeApi',
            'operationId' => 'orderCapturePost',
            'authMethods' => [
            ],
            'middlewares' => [
                "AuthMiddleware"
            ]
        ],
        [
            'httpMethod' => 'POST',
            'basePathWithoutHost' => '',
            'path' => '/order/refund',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractDefaultApi',
            'userClassname' => 'HorzeApi',
            'operationId' => 'orderRefundPost',
            'authMethods' => [
            ],
            'middlewares' => [
                "AuthMiddleware"
            ]
        ],
        [
            'httpMethod' => 'GET',
            'basePathWithoutHost' => '',
            'path' => '/order/refund',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractDefaultApi',
            'userClassname' => 'HorzeApi',
            'operationId' => 'orderRefundGet',
            'authMethods' => [
            ],
            'middlewares' => [
                "AuthMiddleware"
            ]
        ],
        [
            'httpMethod' => 'GET',
            'basePathWithoutHost' => '',
            'path' => '/order/capture',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractDefaultApi',
            'userClassname' => 'HorzeApi',
            'operationId' => 'orderCaptureGet',
            'authMethods' => [
            ],
            'middlewares' => [
                "AuthMiddleware"
            ]
        ]

    ];

    /**
     * Class constructor
     *
     * @param ContainerInterface|array $settings Either a ContainerInterface or an associative array of app settings
     *
     * @throws Exception When implementation class doesn't exists
     */
    public function __construct($settings = [])
    {
        if ($settings instanceof ContainerInterface) {
            // Set container to create App with on AppFactory
            AppFactory::setContainer($settings);
        }
        $this->slimApp = AppFactory::create();

        // middlewares requires Psr\Container\ContainerInterface
        $container = $this->slimApp->getContainer();


        $userOptions = null;
        if ($settings instanceof ContainerInterface && $settings->has('tokenAuthenticationOptions')) {
            $userOptions = $settings->get('tokenAuthenticationOptions');
        } elseif (is_array($settings) && isset($settings['tokenAuthenticationOptions'])) {
            $userOptions = $settings['tokenAuthenticationOptions'];
        }

        foreach ($this->operations as $operation) {
            $callback = function ($request, $response, $arguments) use ($operation) {
                $message = "How about extending {$operation['classname']} by {$operation['apiPackage']}\\{$operation['userClassname']} class implementing {$operation['operationId']} as a {$operation['httpMethod']} method?";
                throw new Exception($message);
                $response->getBody()->write($message);
                return $response->withStatus(501);
            };

            $middlewares = [new JsonBodyParserMiddleware(),new CorsMiddleware()];

            if (in_array("AuthMiddleware", $operation['middlewares'])) {
                array_push($middlewares, new AuthMiddleware());
            }

            if (class_exists("\\{$operation['apiPackage']}\\{$operation['userClassname']}")) {
                $callback = "\\{$operation['apiPackage']}\\{$operation['userClassname']}:{$operation['operationId']}";
            }


            $this->addRoute(
                [$operation['httpMethod']],
                "{$operation['basePathWithoutHost']}{$operation['path']}",
                $callback,
                $middlewares
            )->setName($operation['operationId']);
        }
    }

    /**
     * Merges user defined options with dynamic params
     *
     * @param array $staticOptions Required static options
     * @param array $userOptions   User options
     *
     * @return array Merged array
     */
    private function getTokenAuthenticationOptions(array $staticOptions, array $userOptions = null)
    {
        if (is_array($userOptions) === false) {
            return $staticOptions;
        }

        return array_merge($userOptions, $staticOptions);
    }

    /**
     * Add route with multiple methods
     *
     * @param string[]        $methods     Numeric array of HTTP method names
     * @param string          $pattern     The route URI pattern
     * @param callable|string $callable    The route callback routine
     * @param array|null      $middlewares List of middlewares
     *
     * @return RouteInterface
     *
     * @throws InvalidArgumentException If the route pattern isn't a string
     */
    public function addRoute(array $methods, string $pattern, $callable, $middlewares = [])
    {
        $route = $this->slimApp->map($methods, $pattern, $callable);
        foreach ($middlewares as $middleware) {
            $route->add($middleware);
        }
        return $route;
    }

    /**
     * Returns Slim Framework instance
     *
     * @return App
     */
    public function getSlimApp()
    {
        return $this->slimApp;
    }
}
