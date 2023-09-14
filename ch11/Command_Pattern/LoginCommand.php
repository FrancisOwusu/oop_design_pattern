<?php

namespace Command_Pattern;
require_once 'Command.php';
class LoginCommand extends Command
{

    /**
     * @param CommandContext $context
     * @return bool
     */
    public function execute(CommandContext $context): bool
    {
        // TODO: Implement execute() method.
    $manager = Registry::getAccessManager();
    $user = $context->get('username');
    $pass = $context->get('pass');
    $user_obj = $manager->login($user,$pass);
    if(is_null($user_obj)){
        $context->setError($manager->getError());
        return false;
    }

    $context->addParam("user",$user_obj);
    return true;
    }
}