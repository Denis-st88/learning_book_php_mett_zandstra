<?php

namespace patterns\Visitor\visitor;

use patterns\Visitor\unit\Unit;
use patterns\Visitor\unit\Archer;
use patterns\Visitor\unit\Cavalry;
use patterns\Visitor\composite\Army;
use patterns\Visitor\unit\LaserCannonUnit;
use patterns\Visitor\unit\TroopCarrierUnit;

abstract class ArmyVisitor
{
    abstract public function visit(Unit $node);

    public function visitArcher(Archer $node)
    {
        $this->visit($node);
    }

    public function visitCavalry(Cavalry $node)
    {
        $this->visit($node);
    }

    public function visitLaserCannonUnit(LaserCannonUnit $node)
    {
        $this->visit($node);
    }

    public function visitTroopCarrierUnit(TroopCarrierUnit $node)
    {
        $this->visit($node);
    }

    public function visitArmy(Army $node)
    {
        $this->visit($node);
    }
}
