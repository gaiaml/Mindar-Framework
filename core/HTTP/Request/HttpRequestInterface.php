<?php
/**
 * Mindar Framework (https://framework.mindar.io)
 *
 * @link      https://github.com/damnedx/MindarFramework
 * @copyright Copyright (c) 2017-2018 damnedx
 * @license   MIT License
 */
namespace Mindar\Core\HTTP\Request;


interface HttpRequestInterface
{

    public function get(string $key) : ?string;

    public function post(string $key) : ?string;

    public function requestURI() : string;



}