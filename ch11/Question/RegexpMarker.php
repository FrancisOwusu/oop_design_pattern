<?php

namespace Question;
require_once 'Marker.php';
class RegexpMarker extends Marker
{

    /**
     * @param string $response
     * @return bool
     */
    public function mark(string $response): bool
    {
        // TODO: Implement mark() method.
   return (preg_match("$this->test",$response));
    }
}