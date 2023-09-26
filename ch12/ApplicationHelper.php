<?php

namespace ch12;
require_once 'Registry.php';

class ApplicationHelper
{
    private string $config = __DIR__ . "/data/woo_options.ini";
    private Registry $reg;

    public function __construct()
    {
        $this->reg = Registry::instance();
    }

    public
    function init(): void
    {
        $this->setupOptions();
        if (defined('STDIN')) {
            $request = new CliRequest();
        } else {
            $request = new HttpRequest();
        }
        $this->reg->setRequest($request);
    }

//    private function setupOptions(): void
//    {
////...
//        $vcfile = $conf->get("viewcomponentfile");
//        $cparse = new ViewComponentCompiler();
//        $commandandviewdata = $cparse->parseFile($vcfile);
//        $this->reg->setCommands($commandandviewdata);
//    }
    private function setupOptions(): void
    {
        if (!file_exists($this->config)) {
            throw new AppException("Could not find optionsfile");
        }
        $options = parse_ini_file($this->config, true);
        $this->reg->setConf(new Conf($options['config']));
        $this->reg->setCommands(newConf($options['commands']));
    }

    public function getOptions(): array
    {
        $optionfile = __DIR__ . "/data/woo_options.xml";
        if (!file_exists($optionfile)) {
            throw new AppException("Could not find optionsfile");
        }
        $options = \simplexml_load_file($optionfile);
        $dsn = (string)$options->dsn;
// what do we do with this now?
// ...
        return $dsn;
    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        if (is_null($this->request)) {
            throw new \Exception("No Request set");
        }
        return $this->request;
    }

    public function getApplicationHelper(): ApplicationHelper
    {
        if (is_null($this->applicationHelper)) {
            $this->applicationHelper = new ApplicationHelper();
        }
        return $this->applicationHelper;
    }

    public function setConf(Conf $conf): void
    {
        $this->conf = $conf;
    }

    public function getConf(): Conf
    {
        if (is_null($this->conf)) {
            $this->conf = new Conf();
        }
        return $this->conf;
    }

    public function setCommands(Conf $commands): void
    {
        $this->commands = $commands;
    }

    public function getCommands(): Conf
    {
        if (is_null($this->commands)) {
            $this->commands = new Conf();
        }
        return $this->commands;
    }

}

