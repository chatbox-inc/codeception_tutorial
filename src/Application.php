<?php

use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Logger;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 15/11/16
 * Time: 11:50
 */
class Application extends \Laravel\Lumen\Application
{
    protected function getMonologHandler()
    {
        return (new StreamHandler("php://stderr", Logger::DEBUG))
            ->setFormatter(new LineFormatter(null, null, true, true));
    }
}