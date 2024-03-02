<?php

namespace ch12;
require_once 'Command.php';
class DefaultCommand extends Command
{
    protected function doExecute(Request $request): void
    {
        $request->addFeedback("Welcome to WOO");
        include(__DIR__ . "/main.php");
    }
}