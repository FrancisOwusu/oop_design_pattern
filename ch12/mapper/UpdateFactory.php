<?php

namespace ch12;
require_once '../model/DomainObject.php';
abstract class UpdateFactory
{
    abstract public function newUpdate(DomainObject $obj): array;

    protected function buildStatement(string $table, array $fields, ?array $conditions = null): array
    {
        $terms = array();
        if (!is_null($conditions)) {
            $query = "UPDATE {$table} SET ";
            $query .= implode(" = ?,", array_keys($fields)) . " = ?";
            $terms = array_values($fields);
            $cond = [];
            $query .= " WHERE ";
            foreach ($conditions as $key => $val) {
                $cond[] = "$key = ?";
                $terms[] = $val;
            }
            $query .= implode(" AND ", $cond);
        } else {
            $qs = [];
            $query = "INSERT INTO {$table} (";
            $query .= implode(",", array_keys($fields));
            $query .= ") VALUES (";
            foreach ($fields as $name => $value) {
                $terms[] = $value;
                $qs[] = '?';
            }
            $query .= implode(",", $qs);
            $query .= ")";
        }
        return [$query, $terms];
    }
}