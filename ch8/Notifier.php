<?php

use ch8\MailNotifier;

abstract class Notifier
{
public static function getNotifier(): Notifier
{
// acquire concrete class according to
// configuration or other logic
if (rand(1, 2) === 1) {
return new MailNotifier();
} else {
return new TextNotifier();
}
}
abstract public function inform($message): void;
}