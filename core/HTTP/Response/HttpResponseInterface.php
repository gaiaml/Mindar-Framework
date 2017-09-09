<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 09/09/2017
 * Time: 19:07
 */

namespace Mindar\core\HTTP\Response;


interface HttpResponseInterface
{
    public function addHeader(string $header) : void;

    public function redirect(string $location) : void;

    public function send() : string;

}