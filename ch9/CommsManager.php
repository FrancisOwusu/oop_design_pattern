<?php

namespace ch9;
include_once 'MegaApptEncoder.php';
include_once 'BloggsApptEncoder.php';
class CommsManager
{
    public const BLOGGS = 1;
    public const MEGA = 2;
    public function __construct(private int $mode)
    {
    }
    public function getApptEncoder(): ApptEncoder
    {
        switch ($this->mode) {
            case (self::MEGA):
                return new MegaApptEncoder();
            default:
                return new BloggsApptEncoder();
        }
    }
    public function getHeaderText(): string
    {
        switch ($this->mode) {
            case (self::MEGA):
                return "MegaCal header\n";
            default:
                return "BloggsCal header\n";
        }
    }
}

// listing 09.20
$man = new CommsManager(CommsManager::MEGA);
print (get_class($man->getApptEncoder())) . "\n";
$man = new CommsManager(CommsManager::BLOGGS);
print (get_class($man->getApptEncoder())) . "\n";