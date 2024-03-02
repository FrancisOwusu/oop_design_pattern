<?php
class TimedCostStrategy extends CostStrategy
{
public function cost(Lession $lesson): int
{
return ($lesson->getDuration() * 5);
}
public function chargeType(): string
{
return "hourly rate";
}
}