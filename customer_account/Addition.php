<?php

class Addition
{
    private const int|float $no_1;

    public function add(float|int $no_2): int|float
    {
        return $no_2 + $this->$no_1;
    }
}