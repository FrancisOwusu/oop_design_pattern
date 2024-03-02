<?php

namespace NewPro;
require_once 'ArmyVisitor.php';

abstract class Unit
{

// ...
    public function accept(ArmyVisitor $visitor): void
    {
        $refthis = new \ReflectionClass(get_class($this));
        $method = "visit" . $refthis->getShortName();
        $visitor->$method($this);
    }

    protected function setDepth($depth): void
    {
        $this->depth = $depth;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }
}