<?php

namespace LoginAccess;
require_once 'Observer.php';
class LoginAnalytics implements Observer
{

    /**
     * @param Observable $observable
     * @return void
     */
    public function update(Observable $observable): void
    {
        // TODO: Implement update() method.
        //not type safe!
        $status = $observable->getStatus();
        print __CLASS__ . ": doing something with status info\n";

    }
}