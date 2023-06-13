<?php
namespace OOP;
interface PaymentGatewayInterface {
    public function processPayment(float $amount): bool;
}




