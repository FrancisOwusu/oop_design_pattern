<?php
abstract class CostStrategy {
    abstract public function cost(Lession $lesson): int;
    abstract public function chargeType(): string;
}