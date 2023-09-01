<?php

namespace ch10\Decorator_Pattern;
require_once 'TileDecorator.php';
require_once 'PollutedPlains.php';
require_once 'DiamondDecorator.php';
class PollutionDecorator extends TileDecorator
{

    /**
     * @return int
     */
    public function getWealthFactor(): int
    {
        return $this->tile->getWealthFactor() - 4;
    }
}


$tile = new Plains();
print $tile->getWealthFactor(); // 2

$tile = new DiamondDecorator(new Plains());
print $tile->getWealthFactor(); // 4

$tile = new PollutionDecorator(new DiamondDecorator(newPlains()));
print $tile->getWealthFactor(); // 0