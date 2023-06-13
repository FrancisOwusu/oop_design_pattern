<?php

use OOP\Account;
use OOP\BankTransferGateway;
use OOP\CreditCardGateway;

require_once 'PaymentGatewayInterface.php';
require_once 'BankTransferGateway.php';
require_once 'CreditCardGateway.php';
require_once 'Account.php';

$account = new Account(1000.0);

$bankTransferGateway = new BankTransferGateway();
$creditCardGateway = new CreditCardGateway();


$float = 1.2;

var_dump(gettype($float));

$float = 1.2;

get_debug_type($float);
// "float"
var_dump(get_debug_type($float));


$account->deposit($bankTransferGateway, 500.0);
echo 'Balance after bank transfer deposit: ' . $account->getBalance() . PHP_EOL;

$account->withdraw($creditCardGateway, 200.0);
echo 'Balance after credit card withdrawal: ' . $account->getBalance() . PHP_EOL;
