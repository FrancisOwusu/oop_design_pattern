<?php
abstract class ParamHandler
{
    protected array $params = [];
    public function __construct(protected string $source)
    {
    }
    public function addParam(string $key, string $val): void
    {
        $this->params[$key] = $val;
    }
    public function getAllParams(): array
    {
        return $this->params;
    }


    /**
     * Summary of getInstance
     * @param string $filename
     * @return ParamHandler
     */
    public static function getInstance(string $filename): ParamHandler
    {
        if (preg_match("/\.xml$/i", $filename)) {
            return new XmlParamHandler($filename);
        }
        return new TextParamHandler($filename);
    }
    abstract public function write(): void;
    abstract public function read(): void;
}
