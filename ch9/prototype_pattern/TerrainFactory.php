<?php
require_once ('Sea.php');
require_once ('Plains.php');
require_once ('Forest.php');

require_once ('EarthForest.php');
require_once ('EarthSea.php');
require_once ('EarthPlains.php');
class TerrainFactory
{
    public function __construct(private Sea $sea, private Plains $plains, private Forest $forest)
    {
    }
    public function getSea(): Sea
    {
        return clone $this->sea;
    }
    public function getPlains(): Plains
    {
      return clone $this->plains;
    }
    public function getForest(): Forest
    {
    return clone $this->forest;
    }
}

$factory = new TerrainFactory(
    new EarthSea(),
    new EarthPlains(),
    new EarthForest()
);
print_r($factory->getSea());
print_r($factory->getPlains());
print_r($factory->getForest());