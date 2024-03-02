<?php

namespace Interpreter_Pattern;
require_once 'Expression.php';
require_once 'InterpreterContext.php';
class VariableExpression extends Expression
{
    public function __construct(private string $name,private mixed $val = null)
    {
    }
    public function interpret(InterpreterContext $context):void
    {
        if (! is_null($this->val)) {
            $context->replace($this, $this->val);
            $this->val = null;
        }
    }
    public function setValue(mixed $value): void
    {
        $this->val = $value;
    }
    public function getKey(): string
    {
        return $this->name;
    }
}

$context = new InterpreterContext();
$myvar = new VariableExpression('input', 'four');
$myvar->interpret($context);
print $context->lookup($myvar) . "\n";
// output: four
$newvar = new VariableExpression('input');
$newvar->interpret($context);
print $context->lookup($newvar) . "\n";
// output: four
$myvar->setValue("five");
$myvar->interpret($context);
print $context->lookup($myvar) . "\n";
// output: five
print $context->lookup($newvar) . "\n";