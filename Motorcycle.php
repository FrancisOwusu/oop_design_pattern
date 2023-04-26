<?php
//A class can use a parent’s property or method from the $this variable.
include_once('Vehicle.php');
class Motorcycle extends Vehicle{
    public function pushPadel(){
        $this->drive();

    }
}

echo (new Motorcycle())->drive();

?>