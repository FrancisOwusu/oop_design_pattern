<?php

namespace ch12;
require_once 'Registry';

abstract class Mapper extends DomainObject
{
    protected \PDO $pdo;

    public function __construct()
    {
        $reg = Registry::instance();
        $this->pdo = $reg->getPdo();
    }

    abstract public function update(DomainObject $obj): void;

    abstract protected function doCreateObject(array $raw): DomainObject;

    abstract protected function doInsert(DomainObject $object): void;

    abstract protected function selectStmt(): \PDOStatement;

    abstract protected function targetClass(): string;

    public function find(int $id): ?DomainObject
    {
        $this->selectstmt()->execute([$id]);
        $row = $this->selectstmt()->fetch();
        $this->selectstmt()->closeCursor();
        if (!is_array($row)) {
            return null;
        }

        if (!isset($row['id'])) {
            return null;
        }
        $object = $this->createObject($row);
        return $object;
    }

    public function createObject(array $raw): DomainObject
    {
        $obj = $this->doCreateObject($raw);
        return $obj;
    }

    public
    function insert(DomainObject $obj): void
    {
        $this->doInsert($obj);
    }
    public function findAll(): Collection
    {
        $this->selectAllStmt()->execute([]);
        return $this->getCollection(
            $this->selectAllStmt()->fetchAll()
        );
    }
    abstract protected function selectAllStmt(): \PDOStatement;
    abstract protected function getCollection(array $raw):Collection;
}
