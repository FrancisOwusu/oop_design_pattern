<?php

namespace LoginAccess;
require_once 'Observer.php';
interface Observable
{
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function notify(): void;
}