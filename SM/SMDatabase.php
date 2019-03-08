<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 12.12.2017
 * Time: 20:31
 */

namespace SqlConst\SM;

class SMDatabase implements SMInterface {
    protected $obj = null;
    public function create()
    {
        $this->obj = new Database\Create($this);
        return $this->obj;
    }
    public function drop()
    {
        $this->obj = new Database\Drop($this);
        return $this->obj;
    }
    public function getResult()
    {
        return $this->obj->getResult();
    }
}