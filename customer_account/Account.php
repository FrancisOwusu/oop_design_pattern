<?php
namespace OOP;

class Account {
    private $balance;

    public function __construct(float $balance) {
        $this->balance = $balance;
    }

    public function deposit(PaymentGatewayInterface $paymentGateway, float $amount): bool {
        if ($paymentGateway->processPayment($amount)) {
            $this->balance += $amount;
            return true;
        }
        return false;
    }

    public function withdraw(PaymentGatewayInterface $paymentGateway, float $amount): bool {
        if ($this->balance >= $amount && $paymentGateway->processPayment($amount)) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }

    public function getBalance(): float {
        return $this->balance;
    }
}
