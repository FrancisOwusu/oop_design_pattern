<?php

namespace ch18;

class Validator
{
    public function __construct(private UserStore $store)
    {
    }
    public function validateUser(string $mail, string $pass):bool
    {
        if (! is_array($user = $this->store->getUser($mail))){
            return false;
        }
        if ($user['pass'] == $pass) {
            return true;
        }
        $this->store->notifyPasswordFailure($mail);
        return false;
    }
}