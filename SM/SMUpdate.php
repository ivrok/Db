<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 05.12.2017
 * Time: 21:32
 */

namespace Db\SM;

use Db\SM;

class SMUpdate extends SMWHEREabstract{
    protected $KEYVALS = array();
    protected $TABLE = null;

    public function __construct()
    {
        $this->REQ_FIELDS[] = array('name' => 'TABLE', 'rule' => 'notempty');
        $this->REQ_FIELDS[] = array('name' => 'KEYVALS', 'rule' => 'notempty');
        $this->REQ_FIELDS[] = array('name' => 'WHERE', 'rule' => 'notempty');
    }
    public function table($tab)
    {
        $this->TABLE = $tab;
        return $this;
    }
    public function keyVal($key, $val)
    {
        $this->KEYVALS[] = array('key' => $key, 'val' => $val);
        return $this;
    }
    public function getResult()
    {
        $this->QUERY = 'UPDATE ' . $this->TABLE;
        $this->QUERY .= PHP_EOL . 'SET ' . (implode(', ', array_map(function($item){ return '`' . $item['key'] . '` = ' . (is_numeric($item['val']) ? $item['val'] : '"' . $item['val'] . '"'); }, $this->KEYVALS)));
        if ($this->WHERE) $this->QUERY .= PHP_EOL . 'WHERE ' . implode(PHP_EOL . 'AND ', $this->WHERE);
        return parent::getResult();
    }
}
