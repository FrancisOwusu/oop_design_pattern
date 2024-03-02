<?php
class RegistrationMgr
{
public function register(Lession
 $lesson): void
{
// do something with this Lesson
// now tell someone
$notifier = Notifier::getNotifier();
$notifier->inform("new lesson: cost ({$lesson->cost()})");
}
}