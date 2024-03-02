<?php
abstract class Lession
{
    public const FIXED = 1;
    public const TIMED = 2;
    // public function __construct(protected int $duration, private int $costtype = 1)
    // {
    // }


    public function __construct(private int $duration,private CostStrategy $costStrategy)
    {
    }
    public function cost(): int
    {
    return $this->costStrategy->cost($this);
    }
    public function chargeType(): string
    {
    return $this->costStrategy->chargeType();
    }
    public function getDuration(): int
    {
    return $this->duration;
    }

    // $lessons[] = new Seminar(4, new TimedCostStrategy());
    // $lessons[] = new Lecture(4, new FixedCostStrategy());
    // foreach ($lessons as $lesson) {
    // print "lesson charge {$lesson->cost()}. ";
    // print "Charge type: {$lesson->chargeType()}\n";
    // }













    // public function cost(): int
    // {
    //     switch ($this->costtype) {
    //         case self::TIMED:
    //             return (5 * $this->duration);
    //             break;
    //         case self::FIXED:
    //             return 30;
    //             break;
    //         default:
    //             $this->costtype = self::FIXED;
    //             return 30;
    //     }
    // }
}
