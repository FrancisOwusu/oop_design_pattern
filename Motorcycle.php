<?php
//A class can use a parent’s property or method from the $this variable.


include_once('Vehicle.php');
class Motorcycle extends Vehicle{
    public function pushPadel(){
        echo $this->drive() ."from parent";

    }

    public function drive(){
        echo "Driver running on Motocyle Engine";
    }
}

echo (new Motorcycle())->drive();
echo (new Motorcycle())->pushPadel();


?>