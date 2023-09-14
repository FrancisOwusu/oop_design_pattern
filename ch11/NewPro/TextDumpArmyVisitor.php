<?php

namespace NewPro;

require_once 'ArmyVisitor.php';
require_once 'ch10/Army.php';
require_once 'Unit.php';
require_once 'ch10/Archer.php';
require_once 'ch10/LaserCannonUnit.php';


class TextDumpArmyVisitor extends ArmyVisitor
{

    private string $text = "";

    /**
     * @param Unit $node
     * @return mixed
     */
    public function visit(Unit $node)
    {
        // TODO: Implement visit() method.
        $txt = "";
        $pad = 4 * $node->getDepth();
        $txt .= sprintf("%{$pad}s", "");
        $txt .= get_class($node) . ":";
//        $txt.="bombard: ". $node->
        $this->text .= $txt;
    }

    public function getText(): string
    {
        return $this->text;
    }
}

$main_army = new Army();
$main_army->addUnit(new Army());
$main_army->addUnit(new LaserCannonUnit());
$main_army->addUnit(new Cavalry());
$textdump = (new TextDumpArmyVisitor());
$main_army->accept($textdump);

