<?php

abstract class CellPhone
{
    abstract public function unlock();

    public function turnOn()
    {
        echo "Holding power button...\n";
    }
}


class Iphone extends CellPhone{
    public function unlock(){
        echo "Touching fingerprint reader....\n";
    }
}


class Android extends CellPhone
{
    public function unlock()
    {
        echo "Typing passcode...\n";
    }
}

$iphone = new Iphone();
$iphone->turnOn();
$iphone->unlock();


$android = new Android();
$android->turnOn();
$android->unlock();

?>