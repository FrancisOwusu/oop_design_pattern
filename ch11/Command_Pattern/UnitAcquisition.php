<?php

namespace Command_Pattern;

use ch10\Archer;
use NewPro\Army;
require_once 'NullUnit.php';
class UnitAcquisition
{
    public function getUnits(int $x, int $y): array
    {
// 1. looks up x and y in local data and gets a listof unit ids
// 2. goes off to a data source and gets full unitdata
// here's some fake data
        $army = new Army();
        $army->addUnit(new Archer());
        $found = [
            new Cavalry(),
            null,
            new LaserCanonUnit(),
            $army
        ];
        return $found;
    }




    public function getUnits1(int $x, int $y): array
    {
        $army = new Army();
        $army->addUnit(new Archer());
        $found = [
            new Cavalry(),
            new NullUnit(),
            new LaserCanonUnit(),
            $army
        ];
        return $found;
    }
}

//if (! $unit->isNull()) {
//// do something
//} else {
//    print "null - no action\n";
//}
