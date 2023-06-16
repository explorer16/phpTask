<?php

namespace Routes;

class Router
{
    private $uri;

    private $routes= [
        '/' => 'controllers/loginController.php',
        '/main' => 'controllers/preparingRoomsController.php',
        '/reserving' => 'controllers/checkingRoomController.php'
    ];

    private function getUri()
    {
        $url=$_SERVER['REQUEST_URI'];
        $url=explode('?', $url);
        $this->uri=$url[0];
    }

    public function callController()
    {
        $this->getUri();

        if (array_key_exists($this->uri, $this->routes)&&isset($_COOKIE['name'])&&isset($_COOKIE['email'])){
            require_once($this->routes[$this->uri]);
        } else {
            require_once 'views/404.html';
        }
    }
}


