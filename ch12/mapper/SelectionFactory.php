<?php

namespace ch12;

abstract class SelectionFactory
{
    abstract public function newSelection(IdentityObject $obj): array;

    public function buildWhere(IdentityObject $obj): array
    {
        if ($obj->isVoid()) {
            return ["", []];
        }
        $compstrings = [];
        $values = [];
        foreach ($obj->getComps() as $comp) {
            $compstrings[] = "{$comp['name']}{$comp['operator']} ?";
            $values[] = $comp['value'];
        }
        $where = "WHERE " . implode(" AND ", $compstrings);
        return [$where, $values];
    }

}