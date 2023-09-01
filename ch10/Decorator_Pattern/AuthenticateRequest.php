<?php

namespace ch10\Decorator_Pattern;
require_once 'DecorateProcess.php';
class AuthenticateRequest extends DecorateProcess
{

    /**
     * @param RequestHelper $req
     * @return void
     */
    public function process(RequestHelper $req): void
    {
        print __CLASS__ . ": authenticating request\n";
        $this->processrequest->process($req);
    }
}