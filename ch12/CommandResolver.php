<?php

namespace ch12;
require_once 'Registry.php';
require_once 'Request.php';
class CommandResolver
{
    private static ?\ReflectionClass $refcmd = null;
    private static string $defaultcmd = DefaultCommand::class;

    public function __construct()
    {
        self::$refcmd = new \ReflectionClass(Command::class);
    }

    public function getCommand(Request $request): Command
    {
        $reg = Registry::instance();
        $commands = $reg->getCommands();
        $path = $request->getPath();
        $class = $commands->get($path);
        if (is_null($class)) {
            $request->addFeedback("path '$path' notmatched");
            return new self::$defaultcmd();
        }
        if (!class_exists($class)) {
            $request->addFeedback("class '$class' notfound");
            return new self::$defaultcmd();
        }
        $refclass = new \ReflectionClass($class);
        if (!$refclass->isSubClassOf(self::$refcmd)) {
            $request->addFeedback("command '$refclass' is nota Command");
            return new self::$defaultcmd();
        }
        return $refclass->newInstance();
    }
}

print_r((new CommandResolver())->getCommand());