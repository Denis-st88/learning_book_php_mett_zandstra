<?php

namespace patterns\Interpreter\variables;

use patterns\Interpreter\common\Expression;
use patterns\Interpreter\common\InterpreterContext;

class LiteralExpression extends Expression
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function interpret(InterpreterContext $context)
    {
        $context->replace($this, $this->value);
    }
}
