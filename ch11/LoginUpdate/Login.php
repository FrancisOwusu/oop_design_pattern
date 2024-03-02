<?php

namespace LoginUpdate;

use SplObserver;

class Login implements \SplSubject
{
    private \SplObjectStorage $storage;

    public function __construct()
    {
        $this->storage = new \SplObjectStorage();
    }

    /**
     * @param SplObserver $observer
     * @return void
     */
    public function attach(SplObserver $observer): void
    {
        // TODO: Implement attach() method.
        $this->storage->attach($observer);
    }

    /**
     * @param SplObserver $observer
     * @return void
     */
    public function detach(SplObserver $observer): void
    {
        // TODO: Implement detach() method.
        $this->storage->detach($observer);
    }

    /**
     * @return void
     */
    public function notify()
    {
        // TODO: Implement notify() method.
        foreach ($this->storage as $obs){
            $obs->update($this);
        }
    }
}