<?php

namespace Interpreter_Pattern;
require_once 'Expression.php';
require_once 'InterpreterContext.php';
abstract class OperatorExpression extends Expression
{

    protected function __construct(protected Expression $l_op,protected Expression $r_op){

    }

    public function interpret(InterpreterContext $context) : void
    {
$this->l_op->interpret($context);
$this->r_op->interpret($context);
    $result_l = $context->lookup($this->l_op);
$result_r = $context->lookup($this->r_op);
$this->doInterpret($context, $result_l, $result_r);
    }

    abstract protected function doInterpret(
        InterpreterContext $context,
                           $result_l,
                           $result_r
    ): void;
}