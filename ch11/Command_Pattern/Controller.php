<?php

namespace Comman_Pattern;

use Command_Pattern\CommandContext;
use Command_Pattern\CommandFactory;

class Controller
{
    private CommandContext $context;

    public function __construct()
    {
        $this->context = new CommandContext();
    }

    public function getContext(): CommandContext
    {
        return $this->context;
    }

    public function process(): void
    {
        $action = $this->context->get('action');
        $action = (is_null($action)) ? "default" : $action;
        $cmd = CommandFactory::getCommand($action);
        if (!$cmd->execute($this->context)) {
            //handle failure
        } else {
            //success
            //dispatch view
        }
    }
}

$controller = new Controller();
$context = $controller->getContext();
$context->addParam('action', 'login');
$context->addParam('username', 'bob');
$context->addParam('pass', 'tiddles');
$controller->process();
print $context->getError();