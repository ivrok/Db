<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 12.12.2017
 * Time: 11:03
 */

namespace Db\SM\Table;


class Drop implements \Db\SM\SMInterface{
    public function tableName($name)
    {
        $this->params['name'] = $name;
        return $this;
    }
    public function getResult()
    {
        return 'DROP TABLE ' . $this->params['name'];
    }
}