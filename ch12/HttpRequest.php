<?php

namespace ch12;
require_once 'Request.php';
class HttpRequest extends Request
{
    public function init(): void
    {
     // we're conveniently ignoring POST/GET/etcdistinctions
     // don't do that in the real world!
        $this->properties = $_REQUEST;
        var_dump($_REQUEST);
        exit();
        $this->path = $_SERVER['PATH_INFO'];
        $this->path = (empty($this->path)) ? "/" : $this->path;
    }
    public function forward(string $path): void
    {
        header("Location: {$path}");
        exit;
    }
}

print_r((new HttpRequest())->init());