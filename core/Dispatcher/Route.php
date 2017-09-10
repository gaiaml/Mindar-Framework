<?php
/**
 * Created by PhpStorm.
 * User: Home
 * Date: 09/09/2017
 * Time: 21:38
 */

namespace Mindar\Core\Dispatcher;


class Route
{

    /**
     * @var string
     */
    private $path;
    private $callable;
    private $matches = [];
    private $params = [];

    /**
     * Route constructor.
     * @param string $path
     * @param $callable
     */
    public function __construct(string $path, $callable)
    {

        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    public function match(string $name) : bool
    {
        $name = trim($name, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, "paramConstraints"], $this->path);

        $regex = "#^$path$#i";
        if(!preg_match($regex, $name, $matches))
            return false;

        array_shift($matches);
        $this->matches = $matches;
        return true;
    }
    public function with($param, $regex)
    {
        $this->params[$param] = str_replace('(', '(?:',$regex);
        return $this;
    }

    private function paramConstraints($match) : string
    {
        if(isset($this->params[$match[1]])){
            return '(' . $this->params[$match[1]] . ')';
        }
        return '([^/]+)';
    }

    public function call()
    {
        return call_user_func_array($this->callable, $this->matches);
    }


}