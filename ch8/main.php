<?php
require_once('Lecture.php');
require_once('Lession.php');
class Main extends Lession
{
    function test()
    {
        $lecture = new Lecture(5, Lession::FIXED);
        print "{$lecture->cost()} ({$lecture->chargeType()})\n";
        $seminar = new Seminar(3, Lession::TIMED);
        print "{$seminar->cost()} ({$seminar->chargeType()})\n";
    }
}
