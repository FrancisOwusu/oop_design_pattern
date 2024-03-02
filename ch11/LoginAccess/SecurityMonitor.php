<?php

namespace LoginAccess;
require_once 'Login.php';
require_once 'LoginObserver.php';
class SecurityMonitor extends LoginObserver
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
    $status[] = Login::LOGIN_WRONG_PASS;
//    var_dump($status);
    if($status[0] == Login::LOGIN_WRONG_PASS){
    //send mail to sysadmin
        print __CLASS__ . ": sending mail to sysadmin\n";
    }

    }
}
$login = (new Login());
(new SecurityMonitor($login))->doUpdate($login);