<?php

namespace ch10\Decorator_Pattern;

require_once 'Plains.php';
class DiamondPlains extends Plains
{
    public function getWealthFactor(): int
    {
        return parent::getWealthFactor() + 2;
    }
}