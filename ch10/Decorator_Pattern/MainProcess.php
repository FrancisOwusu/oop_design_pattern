<?php

namespace ch10\Decorator_Pattern;

class MainProcess extends ProcessRequest
{

    /**
     * @param RequestHelper $req
     * @return void
     */
    public function process(RequestHelper $req): void
    {
        print __CLASS__ . ": doing something useful withrequest\n";
    }
}