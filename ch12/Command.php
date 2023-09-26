<?php

namespace ch12;
require_once 'Request.php';
abstract class Command
{

    public const CMD_DEFAULT = 0;
    public const CMD_OK = 1;
    public const CMD_ERROR = 2;
    public const CMD_INSUFFICIENT_DATA = 3;
    final public function __construct()
    {
    }
    public function execute(Request $request): void
    {
        $status = $this->doExecute($request);
        $request->setCmdStatus($status);
    }
    abstract protected function doExecute(Request $request):int;

}