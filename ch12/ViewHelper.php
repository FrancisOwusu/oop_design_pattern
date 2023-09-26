<?php

namespace ch12;

class ViewHelper
{
    public function sponsorList(): string
    {
// do something complicated to get the sponsor listreturn "Bob's Shoe Emporium";
    }

    public function render(string $resource, Request $request):void
    {
        $vh = new ViewHelper();
// now the template will have the $vh variableinclude($)
        include ($resource);
    }
}
