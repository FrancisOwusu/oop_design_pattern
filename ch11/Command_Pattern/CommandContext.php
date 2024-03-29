<?php

namespace Command_Pattern;

class CommandContext
{
    private array $params = [];
    private string $error = "";

    public function __construct()
    {
        $this->params = $_REQUEST;
    }

    public function addParam(string $key, $val): void
    {
        $this->params[$key] = $val;
    }

    public function get(string $key): ?string
    {
        if (isset($this->params[$key])) {
            return $this->params[$key];
        }
        return null;
    }

    public function setError($error): string
    {
        $this->error = $error;
    }

    public function getError(): string
    {
        return $this->error;
    }
}