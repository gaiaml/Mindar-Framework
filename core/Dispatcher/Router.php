<?php
/**
 * Mindar Framework (https://framework.mindar.io)
 *
 * @link      https://github.com/damnedx/MindarFramework
 * @copyright Copyright (c) 2017-2018 damnedx
 * @license   MIT License
 */

namespace Mindar\Core\Dispatcher;

use Mindar\Core\HTTP\Request;
use Mindar\Core\HTTP\Request\HttpRequest;
use Mindar\Core\HTTP\Response;
use Mindar\Core\HTTP\Response\HttpResponse;

class Router
{
    private $httpRequest;
    private $httpResponse;

    private $url;
    private $routes = [];

    /**
     * Router constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->httpRequest = new HttpRequest();
        $this->httpResponse = new HttpResponse();
        $this->url = $url;
    }


    /**
     * @param string $name
     * @param $callable
     * @return HttpResponse
     */
    public function get(string $name, $callable) : HttpResponse
    {
        $route = new Route($name, $callable);
        $this->routes['GET'][] = $route;
        return $this->httpResponse;

    }

    public function post(string $name, $callable) : HttpResponse
    {
        $route = new Route($name, $callable);
        $this->routes['POST'][] = $route;
        return $this->httpResponse;

    }

    public function run()
    {
        // check if method exists in routes
        $method = $this->httpRequest->requestMethod();

        if(!isset($this->routes[$method]))
        {
            throw new RouterException('No methods matches');
        }
        foreach ($this->routes[$method] as $route)
        {
            if($route->match($this->url))
            {
                return $route->call();
            }
        }
        throw new RouterException('No routes matches');

    }

}