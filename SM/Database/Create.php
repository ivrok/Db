<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 12.12.2017
 * Time: 20:32
 */

namespace SqlConst\SM\Database;

use SqlConst\SM;

class Create extends CommonAbstact implements \Db\SM\SMInterface
{
    public function name($name)
    {
        $this->params['name'] = $name;
        return $this;
    }
    public function getResult()
    {
        return 'CREATE DATABASE ' . $this->params['name'];
    }
}