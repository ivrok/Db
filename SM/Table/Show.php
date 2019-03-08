<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 12.12.2017
 * Time: 11:03
 */

namespace SqlConst\SM\Table;


class Show implements \Db\SM\SMInterface {
    public function showtables()
    {
        return $this;
    }
    public function getResult()
    {
        return 'SHOW TABLES';
    }
}