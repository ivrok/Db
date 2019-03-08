<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 05.12.2017
 * Time: 21:32
 */

namespace SqlConst\SM;

use SqlConst\SM;

class SMInsert extends SMabstract implements \Db\SM\SMInterface{
    protected $INTO = null;
    protected $KEYVALS = array();
    public function __construct()
    {
        $this->REQ_FIELDS[] = array('name' => 'INTO', 'rule' => 'notempty');
        $this->REQ_FIELDS[] = array('name' => 'KEYVALS', 'rule' => 'notempty');
    }
    public function into($tab)
    {
        $this->INTO = $tab;
        return $this;
    }
    public function keyVal($key, $val)
    {
        $this->KEYVALS[] = array('key' => $key, 'val' => $val);
        return $this;
    }
    public function getResult()
    {
        $keys = array_map(function($item){ return '`' . $item['key'] . '`'; }, $this->KEYVALS);
        $vals = array_map(function($item){ return is_numeric($item['val']) ? $item['val'] : "'" . $item['val'] . "'"; }, $this->KEYVALS);
        $this->QUERY = 'INSERT INTO ' . $this->INTO . '(' . implode(", ", $keys) . ') VALUES(' . implode(', ', $vals) . ')';
        return parent::getResult();
    }
}