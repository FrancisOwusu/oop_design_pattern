<?php

namespace ch12;

class ComponentDescriptor
{
    private array $views = [];

    public function __construct(private string $path, privatestring $cmdstr)
    {
    }

    public function getCommand(): Command
    {
        $class = $this->cmdstr;
        if (is_null($class)) {
            throw new AppException("unknown class '$class'");
        }
        if (!class_exists($class)) {
            throw new AppException("class '$class' notfound");
        }
        $refclass = new \ReflectionClass($class);
        if (!$refclass->isSubClassOf(Command::class)) {
            throw new AppException("command '$class' is not aCommand");
        }
        return $refclass->newInstance();
    }

    public function setView(int $status, ViewComponent$view): void
    {
        $this->views[$status] = $view;
    }
    public function getView(Request $request): ViewComponent
    {
        $status = $request->getCmdStatus();
        $status = (is_null($status)) ? 0 : $status;
        if (isset($this->views[$status])) {
            return $this->views[$status];
        }
        if (isset($this->views[0])) {
            return $this->views[0];
        }
        throw new AppException("no view found");
    }
}