<?php

namespace Interpreter_Pattern;
require_once 'LiteralExpression.php';
class InterpreterContext
{
    private array $expressionstore = [];
    public function replace(Expression $exp, mixed $value):void
    {
        $this->expressionstore[$exp->getKey()] = $value;
    }
    public function lookup(Expression $exp): mixed
    {
        return $this->expressionstore[$exp->getKey()];
    }
}

$context = new InterpreterContext();
$literal = new LiteralExpression('four');
$literal->interpret($context);
print $context->lookup($literal) . "\n";