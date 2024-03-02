<?php

namespace LoginAccess;

class PartnershipTool extends LoginObserver
{

    /**
     * @param Login $login
     * @return void
     */
    public function doUpdate(Login $login): void
    {
        $status = $login->getStatus();
// check $ip address
// set cookie if it matches a list
print __CLASS__ . ": set cookie if it matches alist\n";
}
}