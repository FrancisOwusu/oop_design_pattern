<?php

namespace ch11\abstract;


use ch11\TestModel;
require_once 'TestModel.php';
require_once 'abstract/GenericBaseModel.php';
class TestController extends GenericBaseModel
{

public function __construct(TestModel $testModel)
{
    parent::__construct($testModel);
}

    /**
     * @return mixed
     */
    public function create(): mixed
    {
        // TODO: Implement create() method.
        return  $this->testModel->create();
    }

    /**
     * @return mixed
     */
    public function edit(): mixed
    {
        // TODO: Implement edit() method.
        return $this->testModel->edit();
    }

    /**
     * @return mixed
     */
    public function update(): mixed
    {
        // TODO: Implement update() method.
        return $this->testModel->update();
    }

    /**
     * @return mixed
     */
    public function delete(): mixed
    {
        // TODO: Implement delete() method.
       return $this->testModel->delete();
    }
}

$model = (new TestModel());
$controller = (new TestController($model));
echo $controller->create();
echo $controller->edit();
echo $controller->update();
echo $controller->delete();
