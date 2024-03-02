<?php

namespace ch10\Decorator_Pattern;

require_once 'TileDecorator.php';
class DiamondDecorator extends TileDecorator
{

    /**
     * @return int
     */
    public function getWealthFactor(): int
    {
        // TODO: Implement getWealthFactor() method.
        return $this->tile->getWealthFactor() + 2;
    }
}