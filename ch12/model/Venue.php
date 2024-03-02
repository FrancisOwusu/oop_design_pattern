<?php

namespace ch12;
require_once 'DomainObject.php';

class Venue extends DomainObject
{
    private SpaceCollection $spaces;

    public function __construct(int $id, private string $name)
    {
        $this->name = $name;
        $this->spaces = self::getCollection(Space::class);
        parent:: __construct($id);
    }

    public function setSpaces(SpaceCollection $spaces): void
    {
        $this->spaces = $spaces;
    }

    public function getSpaces(): SpaceCollection
    {
        return $this->spaces;
    }

    public function addSpace(Space $space): void
    {
        $this->spaces->add($space);
        $space->setVenue($this);
    }

    public function setName(string $name): void
    {
        $this->name = $name;
        $this->markDirty();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSpaces(): SpaceCollection
    {
        if (is_null($this->spaces)) {
            $reg = Registry::instance();
            $this->spaces = $reg->getSpaceCollection();
        }
        return $this->spaces;
    }

    public function setSpaces(SpaceCollection $spaces): void
    {
        $this->spaces = $spaces;
    }

    public function addSpace(Space $space): void
    {
        $this->getSpaces()->add($space);
        $space->setVenue($this);
    }
    public function getSpaces2(): SpaceCollection
    {
        if (is_null($this->spaces)) {
            $reg = Registry::instance();
            $finder = $reg->getSpaceMapper();
            $this->spaces = $finder->findByVenue($this->getId());
        }
        return $this->spaces;
    }
}