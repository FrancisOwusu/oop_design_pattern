<?php

namespace ch10\Decorator_Pattern;

abstract class Tile
{
    abstract public function getWealthFactor(): int;
}