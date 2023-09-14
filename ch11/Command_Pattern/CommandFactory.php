<?php

namespace Command_Pattern;
use Comman_Pattern\Command;

require_once 'Command.php';
class CommandFactory
{
private static string $dir = 'commands';

public static function getCommand(string $action = 'Default'): Command{
    if(preg_match('/\W/',$action)){
        throw new \Exception("illegal characters in action");
    }

    $class = __NAMESPACE__ ."\\commands\\" . UCFirst(strtolower($action)). "Command";
    if(!class_exists($class)){
        throw new CommandNotFoundException("no '$class' class located");
    }

    $cmd = new $class();
    return $cmd;
}
}