<?php

namespace patterns\Visitor\visitor;

use patterns\Visitor\unit\Archer;
use patterns\Visitor\unit\Cavalry;
use patterns\Visitor\unit\Unit;
use patterns\Visitor\unit\TroopCarrierUnit;

class TaxCollectionVisitor extends ArmyVisitor
{
    private $due = 0;
    private $report = '';

    public function visit(Unit $node)
    {
        $this->levy($node, 1);
    }

    public function visitArcher(Archer $node)
    {
        $this->levy($node, 2);
    }

    public function visitCavalry(Cavalry $node)
    {
        $this->levy($node, 3);
    }

    public function visitTroopCarrierUnit(TroopCarrierUnit $node)
    {
        $this->levy($node, 5) ;
    }

    private function levy(Unit $unit, int $amount)
    {
        $this->report .= "Налог для " . get_class($unit);
        $this->report .= ": $amount\n";
        $this->due += $amount;
    }

    public function getReport()
    {
        return $this->report;
    }

    public function getTax()
    {
        return $this->due;
    }
}