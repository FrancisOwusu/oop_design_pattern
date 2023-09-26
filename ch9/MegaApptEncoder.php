<?php

namespace ch9;
include_once 'ApptEncoder.php';
class MegaApptEncoder extends ApptEncoder{


    /**
     * @return string
     */
    public function encode(): string
    {
        // TODO: Implement encode() method.
        return "Appointment data encoded in MegaCalformat\n";
    }
}