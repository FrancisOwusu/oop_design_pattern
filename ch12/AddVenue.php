<?php

namespace ch12;
require_once 'Command.php';
require_once 'Request.php';
class AddVenue extends Command
{
    protected function doExecute(Request $request): int
    {
        $name = $request->getProperty("venue_name");
        if (is_null($name)) {
            $request->addFeedback("no name provided");
            return self::CMD_INSUFFICIENT_DATA;
        } else {
// do some stuff
            $request->addFeedback("'{$name}' added");
            return self::CMD_OK;
        }
        return self::CMD_DEFAULT;
    }
}