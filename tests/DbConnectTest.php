<?php

use PHPUnit\Framework\TestCase;

class DbConnectTest
{
    public function testConnect()
    {
        $config = require '_resources/dbconfig.php';

        \SqlConst\Db::instance(array(
            'typedb' => $config['type'],
            'database' => $config['name'],
            'hostname' => $config['address'],
            'charset' => $config['charset'],
            'username' => $config['user'],
            'password' => $config['pass'],
        ));
    }
}
