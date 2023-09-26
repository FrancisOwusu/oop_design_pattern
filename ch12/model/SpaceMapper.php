<?php

namespace ch12;

class SpaceMapper extends Mapper
{
    private \PDOStatement $selectStmt;
    private \PDOStatement $updateStmt;
    private \PDOStatement $insertStmt;

    public function __construct()
    {
        parent::__construct();
        $this->selectStmt = $this->pdo
            ->prepare("SELECT * from space WHERE id=?");
        $this->updateStmt = $this->pdo
            ->prepare("UPDATE space SET name=?,id=? where id=?");
        $this->insertStmt = $this->pdo->prepare(
            "INSERT INTO space ( name ) VALUES( ? )"
        );

        $this->selectAllStmt = $this->pdo->prepare(
            "SELECT * FROM space");

        $this->findByVenueStmt = $this->pdo->prepare(
            "SELECT * FROM space WHERE venue=?"
        );
    }

    /**
     * @param DomainObject $obj
     * @return void
     */
    public function update(DomainObject $obj): void
    {
   $values =[$obj->getName(),$obj->getId(),$obj->getId()];
   $this->updateStmt->execute($values);
    }

    /**
     * @param array $raw
     * @return DomainObject
     */
    protected function doCreateObject(array $raw): Venue
    {
        $obj = new Venue(
            (int)$raw['id'],
            $raw['name']
        );
        $spacemapper = new SpaceMapper();
        $spacecollection = $spacemapper->findByVenue($raw['id']);
        $obj->setSpaces($spacecollection);
        return $obj;
    }

    /**
     * @param DomainObject $object
     * @return void
     */
    protected function doInsert(DomainObject $object): void
    {
   $values = [$object->getName()];
   $this->insertStmt->execute($values);
   $id= $this->pdo->lastInsertId();
   $object->setId((int)$id);
    }

    /**
     * @return \PDOStatement
     */
    protected function selectStmt(): \PDOStatement
    {
        // TODO: Implement selectStmt() method.
   return $this->selectStmt;
    }

    /**
     * @return string
     */
    protected function targetClass(): string
    {
        // TODO: Implement targetClass() method.
  return Venue::class;
    }
//    public function getCollection(array $raw):VenueCollection
//    {
//        return new VenueCollection($raw, $this);
//    }

    /**
     * @return \PDOStatement
     */
    protected function selectAllStmt(): \PDOStatement
    {
        // TODO: Implement selectAllStmt() method.
    }

    /**
     * @param array $raw
     * @return Collection
     */

    public function getCollection(array $raw): SpaceCollection
    {
        return new SpaceCollection($raw, $this);
    }

    public function findByVenue($vid): SpaceCollection
    {
        $this->findByVenueStmt->execute([$vid]);
        return new SpaceCollection($this->findByVenueStmt->fetchAll(), $this);
    }
}


$mapper = new VenueMapper();
$venue = new Venue(-1, "The Likey Lounge");
// add the object to the database
$mapper->insert($venue);
// find the object again – just to prove it works!
$venue = $mapper->find($venue->getId());
print_r($venue);
// alter our object
$venue->setName("The Bibble Beer Likey Lounge");
// call update to enter the amended data
$mapper->update($venue);
// once again, go back to the database to prove it worked
$venue = $mapper->find($venue->getId());
print_r($venue);