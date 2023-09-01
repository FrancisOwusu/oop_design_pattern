<?php

namespace ch10\Decorator_Pattern;
require_once 'RequestHelper.php';
abstract class ProcessRequest
{
    abstract public function process(RequestHelper $req):void;
}