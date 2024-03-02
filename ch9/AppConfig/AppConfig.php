<?php

require_once 'Settings.php';
class AppConfig
{
    private static ?AppConfig $instance = null;
    private CommsManager $commsManager;

    private function __construct()
    {
// will run once only
        $this->init();
    }

    private function init(): void
    {
        switch (Settings::$COMMSTYPE) {
            case 'Mega':
                $this->commsManager = new MegaCommsManager();
                break;
            default:
                $this->commsManager = newBloggsCommsManager();
        }
    }

    public static function getInstance(): AppConfig
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getCommsManager(): CommsManager
    {
        return $this->commsManager;
    }
}