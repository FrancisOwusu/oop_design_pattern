<?php

namespace ch12;
require_once 'Request.php';
class Registry
{
    private static ?Registry $instance = null;
    private ?Request $request = null;
    private ?TreeBuilder $treeBuilder = null;
    private ?Conf $conf = null;
    private function __construct()
    {
    }
    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getRequest(): Request
    {
        if (is_null($this->request)) {
            $this->request = new \http\Client\Request();
        }
        return $this->request;
    }
    public function get(string $key): mixed
    {
        if (isset($this->values[$key])) {
            return $this->values[$key];
        }
        return null;
    }
    public function set(string $key, mixed $value): void
    {
        $this->values[$key] = $value;
    }



    public function treeBuilder(): TreeBuilder
    {
        if (is_null($this->treeBuilder)) {
            $this->treeBuilder = new TreeBuilder($this->conf()->get('treedir'));
        }
        return $this->treeBuilder;
    }
    public function conf(): Conf
    {
        if (is_null($this->conf)) {
            $this->conf = new Conf();
        }
        return $this->conf;
    }
}
//Registry::testMode();
//$mockreg = Registry::instance();
//$reg = Registry::instance();
//print_r($reg->getRequest());