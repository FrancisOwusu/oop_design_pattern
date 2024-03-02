<?php

namespace NewPro;
require_once 'ArmyVisitor.php';

class TaxCollectionVisitor extends ArmyVisitor
{
    private int $due = 0;
    private string $report = "";

    /**
     * @param Unit $node
     * @return mixed
     */
    public function visit(Unit $node)
    {
        // TODO: Implement visit() method.
        $this->levy($node,1);
    }

    public function visitArcher(Archer $node): void
    {
        $this->levy($node, 2);
    }
    public function visitCavalry(Cavalry $node): void
    {
        $this->levy($node, 3);
    }

    public function visitTroopCarrierUnit(TroopCarrierUnit$node): void
    {
        $this->levy($node, 5);
    }
    private function levy(Unit $unit, int $amount): void
    {
        $this->report .= "Tax levied for " .get_class($unit);
        $this->report .= ": $amount\n";
        $this->due += $amount;
    }
    public function getReport(): string
    {
        return $this->report;
    }
    public function getTax(): int
    {
        return $this->due;
    }
}


$main_army = new Army();
$main_army->addUnit(new Archer());
$main_army->addUnit(new LaserCanonUnit());
$main_army->addUnit(new Cavalry());
$taxcollector = new TaxCollectionVisitor();
$main_army->accept($taxcollector);
print $taxcollector->getReport();
print "TOTAL: ";
print $taxcollector->getTax() . "\n";