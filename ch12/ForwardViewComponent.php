<?php

namespace ch12;
require_once 'ViewComponent.php';
require_once 'Request.php';
class ForwardViewComponent implements ViewComponent
{
    public function __construct(private ?string $path)
    {
    }
    public function render(Request $request): void
    {
        $request->forward($this->path);
    }
}