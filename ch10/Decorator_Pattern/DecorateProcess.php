<?php

namespace ch10\Decorator_Pattern;

require_once 'ProcessRequest.php';
abstract class DecorateProcess extends ProcessRequest
{
    public function __construct(protected ProcessRequest $processrequest)
    {
    }
}
