<?php

namespace Routes;

class Router
{
    private $uri;

    private $routes= [
        '/' => 'controllers/loginController.php',
        '/main' => 'controllers/preparingRoomsController.php',
        '/checking' => 'controllers/checkingRoomController.php',
        '/reserving' => 'controllers/reservingController.php'
    ];

    private function getUri()
    {
        $url=$_SERVER['REQUEST_URI'];
        str_replace('/phpTask', '', $url);
        $url=explode('?', $url);
        $this->uri=$url[0];
    }

    public function callController()
    {
        $this->getUri();

        if (array_key_exists($this->uri, $this->routes)&&isset($_COOKIE['name'])&&isset($_COOKIE['email'])){
            require_once($this->routes[$this->uri]);
        } else {
            require_once 'controllers/loginController.php';
        }
    }
}


