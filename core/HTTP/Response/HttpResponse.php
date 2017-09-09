<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 09/09/2017
 * Time: 19:14
 */

namespace Mindar\core\HTTP\Response;


class HttpResponse implements HttpResponseInterface
{

    public function addHeader(string $header): void
    {
        header($header);
    }

    public function redirect(string $location): void
    {
        header('Location: ' .$location);
        exit;
    }

    public function send(): string
    {

    }
}