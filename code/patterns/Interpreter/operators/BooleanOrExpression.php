<?php

namespace patterns\Interpreter\operators;

use patterns\Interpreter\common\InterpreterContext;

class BooleanOrExpression extends OperatorExpression
{
    protected function dointerpret(InterpreterContext $context, $result_l, $result_r)
    {
        $context->replace($this, $result_l || $result_r);
    }
}
