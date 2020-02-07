<?php

namespace App\Model\Router;

require_once("model/router/RouterException.php");
require_once("model/router/Route.php");

class Router
{
  private $url;
  private $routes = [];

  public function __construct($url = null)
  {
    $this->url = $url ?? $_SERVER["REQUEST_URI"];
  }

  public function run()
  {
    $method = $_SERVER["REQUEST_METHOD"];
    if (!isset($this->routes[$method]))
      throw new RouterException("Request method doesn't exist");
    foreach ($this->routes[$method] as $route) {
      if ($route->match($this->url)) {
        return $route->call();
      }
    }
    throw new RouterException("No matching route");
  }

  public function get($path, $callback)
  {
    $route = new Route($path, $callback);
    $this->routes["GET"][] = $route;
    return $this;
  }
  public function post($path, $callback)
  {
    $route = new Route($path, $callback);
    $this->routes["POST"][] = $route;
    return $this;
  }
  public function any($path, $callback)
  {
    $route = new Route($path, $callback);
    $this->routes["POST"][] = $route;
    $this->routes["GET"][] = $route;
    return $this;
  }
}
