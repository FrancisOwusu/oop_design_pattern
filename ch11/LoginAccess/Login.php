<?php

namespace LoginAccess;
require_once 'Observable.php';
class Login implements Observable
{
    public const LOGIN_USER_UNKNOWN = 1;
    public const LOGIN_WRONG_PASS = 2;
    public const LOGIN_ACCESS = 3;
    private array $status = [];

    private array $observers = [];

    public function handleLogin(string $user, string $pass,string $ip): bool
    {
        $isvalid = false;
        switch (rand(1,3)){
            case 1:
                $this->setStatus(self::LOGIN_ACCESS,$user,$ip);
        $isvalid=true;
break;
            case 2:
                $this->setStatus(self::LOGIN_WRONG_PASS);
        $isvalid = false;
        break;

            case 3:
                $this->setStatus(self::LOGIN_USER_UNKNOWN,$user,$ip);
        $isvalid = false;
        break;
        }
$this->notify();
        Logger::logIP($user, $ip, $this->getStatus());


        if (! $isvalid) {
            Notifier::mailWarning(
                $user,
                $ip,
                $this->getStatus()
            );
        }

        print "returning " . (($isvalid) ? "true" : "false") . "\n";
        return $isvalid;
    }

    private function setStatus(int $status,string $user,string $ip): void{
      $this->status=[$status,$user,$ip];
    }

    public function getStatus():array{
        return $this->status;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function attach(Observer $observer): void
    {
        // TODO: Implement attach() method.
    $this->observers[] = $observer;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function detach(Observer $observer): void
    {
        // TODO: Implement detach() method.
   $this->observers = array_filter(
       $this->observers,function ($a) use ($observer){
           return (!($a === $observer));
   }
   );
    }

    /**
     * @return void
     */
    public function notify(): void
    {
        // TODO: Implement notify() method.
   foreach ($this->observers as $obs){
       $obs->update($this);
   }
    }
}