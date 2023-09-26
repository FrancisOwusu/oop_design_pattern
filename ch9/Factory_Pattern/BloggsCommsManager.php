<?php

namespace Factory_Pattern;

include_once 'CommsManager.php';
include_once './ch9/ApptEncoder.php';
include_once './ch9/';
include_once './ch9/ApptEncoder.php';


class BloggsCommsManager extends \CommsManager
{


    public function getHeaderText(): string
    {
        return "BloggsCal header\n";
    }

    public function getApptEncoder(): \ApptEncoder
    {
        return new BloggsApptEncoder();
    }

    public function getTtdEncoder(): \TtdEncoder
    {
        return new BloggsTtdEncoder();
    }

    public function getContactEncoder(): \ContactEncoder
    {
        return new BloggsContactEncoder();
    }

    public function getFooterText(): string
    {
        return "BloggsCal footer\n";
    }

    public function make(int $flag_int): \Encoder
    {
        switch ($flag_int) {
            case self::APPT:
                return new BloggsCommsManager();
            case self::CONTACT:
                return new BloggsCommsManager();
            case self::TTD:
                return new BloggsCommsManager();
        }
    }

}

$mgr = new BloggsCommsManager();
print $mgr->getHeaderText();
print $mgr->getApptEncoder()->encode();
print $mgr->getFooterText();






