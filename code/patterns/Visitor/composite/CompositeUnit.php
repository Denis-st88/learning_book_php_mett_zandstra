<?php

namespace patterns\Visitor\composite;

use patterns\Visitor\unit\Unit;
use patterns\Visitor\visitor\ArmyVisitor;

abstract class CompositeUnit extends Unit
{
    protected $units = [];

    public function addUnit(Unit $unit)
    {
        foreach ($this->units as $thisunit) {
            if ($unit === $thisunit) {
                return;
            }
        }

        $unit->setDepth($this->depth + 1);
        $this->units[] = $unit;
    }

    public function accept(ArmyVisitor $visitor)
    {
        parent::accept($visitor);
        foreach ($this->units as $thisunit) {
            $thisunit->accept($visitor);
        }
    }

    public function textDump($num = 0): string
    {
        $txtout = parent::textDump($num);
        foreach ($this->units as $unit) {
            $txtout .= $unit->textDump($num + 1);
        }
        return $txtout;
    }
}
