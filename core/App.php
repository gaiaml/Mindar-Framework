<?php
/**
 * Mindar Framework (https://framework.mindar.io)
 *
 * @link      https://github.com/damnedx/MindarFramework
 * @copyright Copyright (c) 2017-2018 damnedx
 * @license   MIT License
 */

namespace Mindar\Core;

use Mindar\Core\Dispatcher\Route;
use Mindar\Core\Dispatcher\Router;


class App
{
    private $router;

    public function __construct()
    {
        $this->router = new Router($_GET['url']);
    }

    public function run() : void
    {
        $this->router->run();
    }

    public function get(string $name, $callable)
    {

        return $this->router->get($name, $callable);

    }

    public function post(string $name, $callable)
    {
        return $this->router->post($name, $callable);
    }
}