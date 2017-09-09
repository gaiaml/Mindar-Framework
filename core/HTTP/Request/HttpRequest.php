<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 09/09/2017
 * Time: 19:02
 */

namespace Mindar\core\HTTP\Request;


class HttpRequest implements HttpRequestInterface
{


    public function get(string $key): ?string
    {
        return $_GET[$key] ?? null;
    }

    public function post(string $key): ?string
    {
        return $_POST[$key] ?? null;
    }

    public function requestURI(): string
    {
        return $_SERVER['REQUEST_URI'];
    }
}