<?php

namespace ch12;
require_once 'ViewComponent.php';
class TemplateViewComponent implements ViewComponent
{
    public function __construct(private string $name)
    {
    }
    public function render(Request $request): void
    {
        $reg = Registry::instance();
        $conf = $reg->getConf();
        $path = $conf->get("templatepath");
        if (is_null($path)) {
            throw new AppException("no template directory");
        }
        $fullpath = "{$path}/{$this->name}.php";
        if (! file_exists($fullpath)) {
            throw new AppException("no template at{$fullpath}");
        }
        include($fullpath);
    }
}
