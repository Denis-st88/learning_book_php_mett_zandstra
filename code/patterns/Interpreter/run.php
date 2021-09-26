<?php

require_once("../../vendor/autoload.php");

use patterns\Interpreter\common\InterpreterContext;
use patterns\Interpreter\operators\EqualsExpression;
use patterns\Interpreter\variables\LiteralExpression;
use patterns\Interpreter\variables\VariableExpression;
use patterns\Interpreter\operators\BooleanOrExpression;

$context = new InterpreterContext();
$input = new VariableExpression('input');
$statement = new BooleanOrExpression(
    new EqualsExpression($input, new LiteralExpression('четыре')),
    new EqualsExpression($input, new LiteralExpression('4'))
) ;

foreach (['четыре', '4', '52'] as $val) {
    $input->setValue($val);
    print "$val:\n";

    $statement->interpret($context);

    if ($context->lookup($statement)) {
        print "Правильный ответ!\n\n";
    } else {
        print "Вы ошиблтсь!\n\n";
    }
}
