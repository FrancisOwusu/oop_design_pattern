<?php

namespace ch12;
require_once 'Request.php';
require_once 'Registry.php';
require_once 'Controller.php';

class CliRequest extends Request
{

    /**
     * @return void
     */
    public function init(): void
    {
        $args = $_SERVER['argv'];
        foreach ($args as $arg) {
            if (preg_match("/^path:(\S+)/", $arg, $matches)) {
                $this->path = $matches[1];
            } else {
                if (strpos($arg, '=')) {
                    list($key, $val) = explode("=", $arg);
                    $this->setProperty($key, $val);
                }
            }
        }
        $this->path = (empty($this->path)) ? "/" : $this->path;
    }

    public function forward(string $path): void
    {
// tack the new path onto the end the argument list
// last argument wins
        $_SERVER['argv'][] = "path:{$path}";
        Registry::reset();
        Controller::run();
    }
}