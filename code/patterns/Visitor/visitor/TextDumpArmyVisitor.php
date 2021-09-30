<?php

namespace patterns\Visitor\visitor;

use patterns\Visitor\unit\Unit;

class TextDumpArmyVisitor extends ArmyVisitor
{
    private $text = '';

    public function visit(Unit $node)
    {
        $txt = '';
        $pad = 4 * $node->getDepth();
        $txt .= sprintf("%{$pad}s", '');
        $txt .= get_class($node);
        $txt .= " Огневая мощь: " . $node->bombardStrength() . "\n";
        $this->text .= $txt;
    }

    public function getText()
    {
        return $this->text;
    }
}
