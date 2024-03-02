<?php

namespace ch10\Decorator_Pattern;
require_once 'Plains.php';
class PollutedPlains extends Plains
{
    public function getWealthFactor(): int
    {
        return parent::getWealthFactor() - 4;
    }
}

// listing 10.21
$tile = new PollutedPlains();
print $tile->getWealthFactor();