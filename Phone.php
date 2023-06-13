<?php
class Phone{
private $number;
public function setNumber($number) {

//$this->number = $number;
if (substr($number, 0, 1) !== '7') {
    $this->number = $number;
}
}
}
$phone  = new Phone();
echo $phone->setNumber('123-456-7890');
// echo (new Phone())->setNumber('123-456-7890');
$phone = new Phone();
$phone->setNumber('123-456-7890');

?>