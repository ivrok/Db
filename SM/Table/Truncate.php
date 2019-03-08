<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 12.12.2017
 * Time: 11:07
 */

namespace SqlConst\SM\Table;


class Truncate implements \Db\SM\SMInterface
{
    public function tableName($name)
    {
        $this->params['name'] = $name;
        return $this;
    }
    public function getResult()
    {
        return 'TRUNCATE TABLE ' . $this->params['name'];
    }
}