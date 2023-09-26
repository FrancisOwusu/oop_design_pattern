<?php

namespace ch12;

abstract class IdentityObject
{
    private ?string $name = null;
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
}