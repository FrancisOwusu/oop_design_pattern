<?php

namespace ch12;
require_once 'Venue.php';
require_once 'Collection.php';
require_once 'Registry.php';
class VenueCollection extends Collection
{

    /**
     * @return string
     */
    public function targetClass(): string
    {
        // TODO: Implement targetClass() method.
        return Venue::class;
    }


}

$reg = Registry::instance();
$collection = $reg->getVenueCollection();
$collection->add(new Venue(-1, "Loud and Thumping"));
$collection->add(new Venue(-1, "Eeezy"));
$collection->add(new Venue(-1, "Duck and Badger"));
foreach ($collection as $venue) {
    print $venue->getName() . "\n";
}
