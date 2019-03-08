<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 11.12.2017
 * Time: 11:39
 */

namespace SqlConst\SM\Table;

use SqlConst\SM;

class CommonAbstact implements \Db\SM\SMInterface
{
    protected $createObj = null;
    protected $params = array();

    public function __construct(Create $createObj)
    {
        $this->createObj = $createObj;
    }
    public function finish()
    {
        return $this->createObj;
    }

    public function getResult()
    {
        return $this->params;
    }
}