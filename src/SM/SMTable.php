<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 11.12.2017
 * Time: 0:47
 */

namespace SqlConst\SM;



class SMTable implements \Db\SM\SMInterface {
    protected $obj = null;
    public function create()
    {
        $this->obj = new Table\Create();
        return $this->obj;
    }
    public function drop()
    {
        $this->obj = new Table\Drop();
        return $this->obj;
    }
    public function truncate()
    {
        $this->obj = new Table\Truncate();
        return $this->obj;
    }
    public function alter()
    {
        $this->obj = new Table\Alter();
        return $this->obj;
    }
    public function show()
    {
        $this->obj = new Table\Show();
        return $this->obj;
    }
    public function getResult()
    {
        return $this->obj->getResult();
    }
}