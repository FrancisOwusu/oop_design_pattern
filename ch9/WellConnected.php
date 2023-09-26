<?php
class WellConnected extends Employee
{
public function fire(): void
{
print "{$this->name}: I'll call my dad\n";
}
}