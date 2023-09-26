<?php
class FixedCostStrategy extends CostStrategy
{
    public function cost(Lession $lesson): int
    {
        return 30;
    }
    public function chargeType(): string
    {
        return "fixed rate";
    }
}
