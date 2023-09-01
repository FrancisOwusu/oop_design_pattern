<?php

namespace ch10\Facade;

class Product
{
    public string $id;
    public string $name;
    public function __construct(string $id, string $name)
    {

$this->id = $id;
$this->name = $name;
}
}