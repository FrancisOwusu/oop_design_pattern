<?php
namespace OOP;
include_once('./PaymentGatewayInterface.php');

class BankTransferGateway implements PaymentGatewayInterface {
    public function processPayment(float $amount): bool {
        // Code to process payment using bank transfer
        if(!is_null($amount)){
            return false;
        }
        return true;
    }
}
