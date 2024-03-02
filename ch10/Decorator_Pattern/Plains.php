<?php

namespace ch10\Decorator_Pattern;
require_once 'Tile.php';
class Plains extends Tile
{
    private int $wealthfactor = 2;
    public function getWealthFactor(): int
    {
     return $this->wealthfactor;
    }
}