<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 05.12.2017
 * Time: 21:32
 */

namespace SqlConst\SM;

use SqlConst\SM;

class SQLMaker {
    private static $inst = null;
    private $obj = null;
    private function __construct(){}
    public static function instance()
    {
        if (!self::$inst) self::$inst = new self(func_get_args());
        return self::$inst;
    }
    public function select($select='', $as = '')
    {
        $this->obj = new SMSelect($select, $as);
        return $this->obj;
    }
    public function insert()
    {
        $this->obj = new SMInsert();
        return $this->obj;
    }
    public function update()
    {
        $this->obj = new SMUpdate();
        return $this->obj;
    }
    public function delete()
    {
        $this->obj = new SMDelete();
        return $this->obj;
    }
    public function table()
    {
        $this->obj = new SMTable();
        return $this->obj;
    }
    public function database()
    {
        $this->obj = new SMDatabase();
        return $this->obj;
    }
    public function getResult()
    {
        return $this->obj->getResult();
    }
}