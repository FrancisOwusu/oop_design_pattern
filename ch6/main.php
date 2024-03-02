<?php
class Main
{
    protected $file = "/tmp/params.txt";
    // listing 06.01
    function readParams(string $source): array
    {
        $params = [];
        if (preg_match("/\.xml$/i", $source)) {
            // read XML parameters from $source
        } else {
            // read text parameters from $source
        }
        return $params;
    }
    function writeParams(array $params, string $source): void
    {
        if (preg_match("/\.xml$/i", $source)) {
            // write XML parameters to $source
        } else {
            // write text parameters to $source
        }
    }

    public function textMain()
    {
        $params = [
            "key1" => "val1",
            "key2" => "val2",
            "key3" => "val3",
        ];

        writeParams($params, $file);
        $output = readParams($file);
        print_r($output);
    }
}
