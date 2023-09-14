<?php

namespace NewPro;
require_once 'Archer.php';
require_once 'Unit.php';
require_once 'LaserCannonUnit.php';
class Army extends Unit
{
private array $units = [];
//public function addUnit(Unit $unit): void {
//    array_push($this->units,$unit);
//}

    public function addUnit(Unit $unit): void {
    if(in_array($unit,$this->units,true)){
        return;
    }
     $this->units[] = $unit;

    }

public function bombardStrength() : int {

    $ret = 0;
    foreach ($this->units as $unit){
        $ret += $unit->bombardStrength();
    }

//    foreach ($this->armies as $army) {
//        $ret += $army->bombardStrength();
//    }
    return $ret;
}

    public function addArmy(Army $army): void
    {
        array_push($this->armies, $army);
    }
/**
 * @param Unit $unit
 * @return void
 */public function removeUnit(Unit $unit): void
{
    // TODO: Implement removeUnit() method.
    $idx = array_search($unit,$this->units,true);
    if(is_int($idx)){
        array_splice($this->units,$idx,1,[]);
    }
}}

// create an army
$main_army = new Army();
// add some units
$main_army->addUnit(new Archer());
$main_army->addUnit(new LaserCannonUnit());
// create a new army
$sub_army = new Army();
// add some units
$sub_army->addUnit(new Archer());
$sub_army->addUnit(new Archer());
$sub_army->addUnit(new Archer());
// add the second army to the first
$main_army->addUnit($sub_army);
// all the calculations handled behind the scenes
print "attacking with strength: {$main_army->bombardStrength()}\n";
//var_dump($unit2->bombardStrength());