<?php

namespace ch12;

class Field
{
    protected array $comps = [];
    protected bool $incomplete = false;

// sets up the field name (age, for example)
    public function __construct(protected string $name)
    {
    }
// add the operator and the value for the test
// (> 40, for example) and add to the $comps property
    public function addTest(string $operator, $value): void
    {
        $this->comps[] = [
            'name' => $this->name,
            'operator' => $operator,
            'value' => $value
        ];
    }

// comps is an array so that we can test one field inmore than one way
    public function getComps(): array
    {
        return $this->comps;
    }
// if $comps does not contain elements, then we have
// comparison data and this field is not ready to be usedin
// a query
    public function isIncomplete(): bool
    {
        return empty($this->comps);
    }
}