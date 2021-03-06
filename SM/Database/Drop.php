<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 12.12.2017
 * Time: 20:41
 */

namespace SqlConst\SM\Database;

use SqlConst\SM;

class Drop extends CommonAbstact implements \Db\SM\SMInterface
{
    public function name($name)
    {
        $this->params['name'] = $name;
        return $this;
    }
    public function getResult()
    {
        return 'DROP DATABASE ' . $this->params['name'];
    }
}