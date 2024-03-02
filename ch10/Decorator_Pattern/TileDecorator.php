<?php

namespace ch10\Decorator_Pattern;
require_once 'Tile.php';
abstract class TileDecorator extends Tile
{
protected Title $title;
public function __construct(Title $title){
    $this->title = $title;
}
}