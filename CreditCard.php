<?php

interface Payment
{
    public function charge($amount);
}

class CreditCard implements Payment
{
    public function charge($amount)
    {
        // contacts a credit card payment provider...
    }
}

$creditCard = new CreditCard();
if($creditCard instanceof Payment){
    $creditCard->charge(25);
}