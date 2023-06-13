<?php

class Addition
{
    private int|float $no_1;

    public function add(float|int $no_2): int|float
    {
        return $no_2 + $no_1;
    }
}