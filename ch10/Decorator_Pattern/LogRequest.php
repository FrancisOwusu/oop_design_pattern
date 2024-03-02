<?php

namespace ch10\Decorator_Pattern;
require_once 'DecorateProcess.php';
class LogRequest extends DecorateProcess
{

    /**
     * @param RequestHelper $req
     * @return void
     */
    public function process(RequestHelper $req): void
    {
        print __CLASS__ . ": logging request\n";
        $this->processrequest->process($req);
    }
}