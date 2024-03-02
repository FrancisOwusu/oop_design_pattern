<?php

namespace ch12\events;
use ch12\{events\IdentityObject};

//require_once '../events/IdentityObject.php';

class EventIdentityObject extends IdentityObject
{
    public function __construct(string $field = null)
    {
        parent:: construct(
            $field,
            ['name', 'id', 'start', 'duration', 'space']
        );
    }
}

try {
    $idobj = new EventIdentityObject();
    $idobj->field("banana")
        ->eq("The Good Show")
        ->field("start")
        ->gt(time())
        ->lt(time() + (24 * 60 * 60));
    print $idobj;
} catch (\Exception $e) {
    print $e->getMessage();
}
