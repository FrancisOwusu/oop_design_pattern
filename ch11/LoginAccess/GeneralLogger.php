<?php

namespace LoginAccess;
require_once 'LoginObserver.php';
class GeneralLogger extends LoginObserver
{

    public function __construct(Login $login)
    {
        parent::__construct($login);
    }

    /**
     * @param Login $login
     * @return void
     */
    public function doUpdate(Login $login): void
    {
        // TODO: Implement doUpdate() method.
        $status = $login->getStatus();
// add login data to log
        print __CLASS__ . ": add login data to log\n";
    }
}

$login = (new Login());
$genLogin = new GeneralLogger($login);
$genLogin->update($login);
$genLogin->doUpdate($login);