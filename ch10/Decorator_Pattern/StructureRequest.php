<?php

namespace ch10\Decorator_Pattern;
require_once 'DecorateProcess.php';
require_once 'AuthenticateRequest.php';
require_once 'LogRequest.php';
require_once 'MainProcess.php';
class StructureRequest extends DecorateProcess
{

    /**
     * @param RequestHelper $req
     * @return void
     */
    public function process(RequestHelper $req): void
    {
        print __CLASS__ . ": structuring request data\n";
        $this->processrequest->process($req);
    }
}

$process = new AuthenticateRequest(
    new StructureRequest(
        new LogRequest(
            new MainProcess()
        )
    )
);
$process->process(new RequestHelper());