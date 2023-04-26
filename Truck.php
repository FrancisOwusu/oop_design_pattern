<?php
include_once('Vehicle.php');
class Truck extends Vehicle {



}

$trk = new Truck();
$objTruck=$trk->drive();
var_dump($objTruck);
?>