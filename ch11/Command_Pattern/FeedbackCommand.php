<?php

namespace Command_Pattern;
require_once 'Command.php';
class FeedbackCommand extends Command
{

    /**
     * @param CommandContext $context
     * @return bool
     */
    public function execute(CommandContext $context): bool
    {
        // TODO: Implement execute() method.
        $msgSystem = Registry::getMessageSystem();
        $email = $context->get('email');
        $topic = $context->get('topic');
        $msg = $context->get('msg');
        $result = $msgSystem->send($email, $msg, $topic);
        if (! $result) {
            $context->setError($msgSystem->getError());
            return false;
        }
        return true;
    }
}