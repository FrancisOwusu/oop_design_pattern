<?php
namespace ch9;
include_once ('Employee.php');
class Minion extends Employee
{
    public function fire(): void
    {
        print "{$this->name}: I'll clear my desk\n";
    }
}
