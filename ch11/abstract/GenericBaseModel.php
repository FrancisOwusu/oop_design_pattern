<?php

namespace ch11\abstract;
use ch11\TestModel;
use BaseModel;
require_once 'interface/BaseModel.php';
//require_once 'interface/GenericBaseModel.php';
abstract class GenericBaseModel implements BaseModel
{
    public TestModel $testModel;
    public function __construct(TestModel $testModel)
    {
        $this->testModel = $testModel;
    }
    abstract public function create(): mixed;
    abstract public function edit(): mixed;
    abstract public function update(): mixed;
    abstract public function delete(): mixed;
}