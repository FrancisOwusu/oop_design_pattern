<?php

namespace LoginAccess;
require_once 'Observable.php';
interface Observer
{
public function update(Observable $observable): void;
}