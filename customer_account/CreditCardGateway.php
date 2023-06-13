<?php
namespace OOP;
include_once('./PaymentGatewayInterface.php');
class CreditCardGateway implements PaymentGatewayInterface {
    public function processPayment(float $amount): bool {
        // Code to process payment using credit card
        if(!is_null($amount)){
            return false;
        }
        return true;
    }
}
