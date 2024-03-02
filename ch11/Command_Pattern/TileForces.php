<?php

namespace Command_Pattern;

use Command_Pattern\UnitAcquisition;

require_once 'UnitAcquisition.php';
class TileForces
{
    private int $x;
    private int $y;
    private array $units = [];
    public function __construct(int $x, int $y,UnitAcquisition $acq)
    {
        $this->x = $x;
        $this->y = $x;
        $this->units = $acq->getUnits($this->x, $this->y);
    }
// ...
// TileForces
    public function firepower(): int
    {
        $power = 0;
        foreach ($this->units as $unit) {
            if(!is_null($unit)) {
                $power += $unit->bombardStrength();
            }
        }
        return $power;
    }
}

$acquirer = new UnitAcquisition();
$tileforces = new TileForces(4, 2, $acquirer);
$power = $tileforces->firepower();
print "power is {$power}\n";