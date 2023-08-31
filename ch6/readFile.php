<?php
class ReadFile
{
    public function main()
    {
        $test = ParamHandler::getInstance(__DIR__ . "/params.xml");
        $test->addParam("key1", "val1");
        $test->addParam("key2", "val2");
        $test->addParam("key3", "val3");
        $test->write(); // writing in XML format


        $test = ParamHandler::getInstance(__DIR__ . "/params.txt");
         $test->read(); // reading in text format
         $params = $test->getAllParams();
         print_r($params);
    }
}
