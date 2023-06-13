<?php
include_once('Vehicle.php');
class Tracker extends Vehicle{
    
    public function drive(){
        echo "driving slowly...\n";
    }
}


$trk = new Tracker();
$objTruck=$trk->drive();
var_dump($objTruck);

?>