<?php

namespace ch10;
require_once 'CompositeUnit.php';
class TroopCarrier extends CompositeUnit
{

    /**
     * @return int
     */
    public function addUnit(Unit $unit): void
    {
        if ($unit instanceof Cavalry) {
            throw new UnitException("Can't get a horse on thevehicle");
        }
        parent::addUnit($unit);
    }
    public function bombardStrength(): int
    {
        return 0;
    }
}