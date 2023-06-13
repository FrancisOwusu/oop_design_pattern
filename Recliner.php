<?php

include_once 'Chair.php';
class Recliner implements Chair{
private $color;
private $legs;

public function setColor($color){
    $this->color = $color;
}

public function setLegs($number){
    $this->legs = $number;
}

}