<?php
/*

If you override a parent’s property or method, the $this variable will refer to the child’s implementation of the property or method. To call the parent’s property or method explicity, use the parent keyword.

*/
include_once('Vehicle.php');
class RaceCar extends Vehicle{
    public function drive()
    {
        parent::drive();

        echo "driving even faster...\n";
    }
}
$racecar = new Racecar();
$racecar->drive();
?>