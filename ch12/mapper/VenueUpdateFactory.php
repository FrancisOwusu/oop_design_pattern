<?php

namespace ch12\mapper;
use ch12\mapper\UpdateFactory;
use ch12\model\DomainObject;
//require_once '../model/DomainObject.php';
//require_once 'UpdateFactory.php';
class VenueUpdateFactory extends UpdateFactory
{
    public function newUpdate(DomainObject $obj): array
    {
// note type checking removed
        $id = $obj->getId();
        $cond = null;
        $values['name'] = $obj->getName();
        if ($id > 0) {
            $cond['id'] = $id;
        }
        return $this->buildStatement("venue", $values,$cond);
    }
}

