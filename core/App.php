<?php
/**
 * Mindar Framework (https://framework.mindar.io)
 *
 * @link      https://github.com/damnedx/MindarFramework
 * @copyright Copyright (c) 2017-2018 damnedx
 * @license   MIT License
 */

namespace Mindar\Core;

use Mindar\Core\HTTP\Request;
use Mindar\core\HTTP\Request\HttpRequest;
use Mindar\Core\HTTP\Response;
use Mindar\core\HTTP\Response\HttpResponse;

class App
{
    protected $httpRequest;
    protected $httpResponse;
    protected $name;

    /**
     * @return mixed
     */
    public function getHttpRequest()
    {
        return $this->httpRequest;
    }

    /**
     * @return mixed
     */
    public function getHttpResponse()
    {
        return $this->httpResponse;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function run()
    {

    }

    public function __construct()
    {
        $this->httpRequest = new HttpRequest();
        $this->httpResponse = new HttpResponse();
    }

}