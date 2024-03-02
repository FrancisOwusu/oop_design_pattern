<?php
namespace ch8;
use Notifier;
require_once('Notifier.php');

class MailNotifier extends Notifier
{
public function inform($message): void
{
print "MAIL notification: {$message}\n";
}
public function testInform() : mixed {
    return $this->inform('Ghana');
}
}