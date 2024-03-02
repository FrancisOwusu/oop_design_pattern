<?php

namespace ch10;
require_once 'UnitException.php';
abstract class Unit
{
    public function addUnit(Unit $unit): void {
        throw  new UnitException(get_class($this) . "is a leaf");
    }
     public function removeUnit(Unit $unit): void{
        throw  new UnitException(get_class($this) . "is a leaf");
    }
    abstract public function bombardStrength(): int;
}