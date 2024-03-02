<?php
class MailNotifier extends Notifier
{
public function inform($message): void
{
print "MAIL notification: {$message}\n";
}
}