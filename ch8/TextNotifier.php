<?php
class TextNotifier extends Notifier
{
public function inform($message): void
{
print "TEXT notification: {$message}\n";
}
}