<?php

namespace ch12;
require_once 'Mapper.php';
require_once 'DomainObject.php';
abstract class GenCollection
{
    protected int $total = 0;
    private array $objects = [];

    public function __construct(protected array $raw = [], protected ?Mapper $mapper = null)
    {
        $this->total = count($raw);
        if (count($raw) && is_null($mapper)) {
            throw new AppException("need Mapper to generateobjects");
        }
    }

    public function add(DomainObject $object): void
    {
        $class = $this->targetClass();
        if (!($object instanceof $class)) {
            throw new AppException("This is a {$class}collection");
        }
        $this->notifyAccess();
        $this->objects[$this->total] = $object;
        $this->total++;
    }

    public function getGenerator(): \Generator
    {
        for ($x = 0; $x < $this->total; $x++) {
            yield $this->getRow($x);
        }
    }

    abstract public function targetClass(): string;

    protected function notifyAccess(): void
    {
// deliberately left blank!
    }

    private function getRow(int $num): ?DomainObject
    {
        $this->notifyAccess();
        if ($num >= $this->total || $num < 0) {
            return null;
        }
        if (isset($this->objects[$num])) {
            return $this->objects[$num];
        }
        if (isset($this->raw[$num])) {
            $this->objects[$num] = $this->mapper->createObject($this->raw[$num]);
            return $this->objects[$num];
        }
        return null;
    }

    public function getVenueMapper(): VenueMapper
    {
        return new VenueMapper();
    }
    public function getSpaceMapper(): SpaceMapper
    {
        return new SpaceMapper();
    }
    public function getEventMapper(): EventMapper
    {
        return new EventMapper();
    }
    public function getVenueCollection(): VenueCollection
    {
        return new VenueCollection();
    }
    public function getSpaceCollection(): SpaceCollection
    {
        return new SpaceCollection();
    }
    public function getEventCollection(): EventCollection
    {
        return new EventCollection();
    }
}


// listing 13.11
$genvencoll = new GenVenueCollection();
$genvencoll->add(new Venue(-1, "Loud and Thumping"));
$genvencoll->add(new Venue(-1, "Eeezy"));
$genvencoll->add(new Venue(-1, "Duck and Badger"));
$gen = $genvencoll->getGenerator();
foreach ($gen as $wrapper) {
    print_r($wrapper);
}