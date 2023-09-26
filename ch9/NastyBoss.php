<?php
namespace ch9;
include_once ('Minion.php');
class NastyBoss
{
    private array $employees = [];
    public function addEmployee(string $employeeName): void
    {
        $this->employees[] = new Minion($employeeName);
    }
    public function projectFails(): void
    {

        if (count($this->employees) > 0) {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}

$boss = new NastyBoss();
$boss->addEmployee("harry");
$boss->addEmployee("bob");
$boss->addEmployee("mary");
$boss->projectFails();
// Here is the output:mary: I'll clear my desk