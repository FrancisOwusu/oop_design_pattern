<?php

namespace ch12;

abstract class DomainObject
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public static function getCollection(string $type): Collection
    {
// dummy implementation
        return Collection::getCollection($type);
    }

    public function markDirty(): void
    {
// next chapter!
    }
}

