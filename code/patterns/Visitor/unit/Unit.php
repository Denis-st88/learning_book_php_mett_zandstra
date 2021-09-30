<?php

namespace patterns\Visitor\unit;

use patterns\Visitor\visitor\ArmyVisitor;

abstract class Unit
{
    protected $depth = 0;

    public function textDump($num = 0): string
    {
        $txtout = '';
        $pad = 4 * $num;
        $txtout .= sprintf("%{$pad}s", "");
        $txtout .= get_class($this) . ": ";
        $txtout .= "Огневая мощь: " . $this->bombardStrength() . "\n";
        return $txtout;
    }

    public function accept(ArmyVisitor $visitor)
    {
        $refthis = new \ReflectionClass(get_class($this)) ;
        $method = "visit" . $refthis->getShortName();
        $visitor->$method($this);
    }

    protected function setDepth($depth)
    {
        $this->depth = $depth;
    }

    public function getDepth()
    {
        return $this->depth;
    }
}
