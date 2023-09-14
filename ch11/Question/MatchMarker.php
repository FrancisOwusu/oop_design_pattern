<?php

namespace Question;

class MatchMarker extends Marker
{

    /**
     * @param string $response
     * @return bool
     */
    public function mark(string $response): bool
    {
        // TODO: Implement mark() method.
    return ($this->test == $response);
    }
}