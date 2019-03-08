<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 05.12.2017
 * Time: 21:33
 */

namespace SqlConst\SM;

use SqlConst\SM;

class SMSelect extends SMWHEREandFROMabstract{
    protected $SELECT = array();
    protected $JOIN = array();
    protected $GROUP = array();
    protected $ORDER = array();
    protected $LIMIT = null;
    protected $OFFSET = null;
    protected $HAVING = array();

    public function __construct($select, $as = '')
    {
        $this->REQ_FIELDS[] = array('name' => 'FROM', 'rule' => 'notempty');
        $this->REQ_FIELDS[] = array('name' => 'SELECT', 'rule' => 'notempty');
        $this->select($select, $as);
    }
    public function select($select, $as = '')
    {
        if (!$select) return $this;
        $select = $this->needBackqouteToSelect($select) ? '`' . $select . '`' : $select;
        $select .= $as ? ' AS ' . $as : '';
        $this->SELECT[] = $select;
        return $this;
    }
    protected function needBackqouteToSelect($select)
    {
        if (mb_ereg('\(', $select)) return false;
        if (mb_ereg('\*', $select)) return false;
        if (mb_ereg('\.', $select)) return false;
        return true;
    }
    public function join($position, $tab, $as, $on)
    {
        $this->JOIN[] = $position . ' JOIN ' . $tab . ' AS ' . $as . ' ON ' . $on;
        return $this;
    }
    public function group($col)
    {
        $this->GROUP[] = $col;
        return $this;
    }
    public function order($col, $dir = 'DESC')
    {
        $this->ORDER[] = $col . ' ' . $dir;
        return $this;
    }
    public function limit($limit)
    {
        $this->LIMIT = (int)$limit;
        return $this;
    }
    public function offset($offset)
    {
        $this->OFFSET = (int)$offset;
        return $this;
    }
    public function having($parName, $parValue, $operation = '=')
    {
        $parValue = $this->transformTextValue($parValue);
        $this->HAVING[] = $parName . ' ' .  $operation . ' ' . $parValue;
        return $this;
    }
    public function getResult()
    {
        $this->QUERY = 'SELECT ' . implode(', ', $this->SELECT) . PHP_EOL;
        $this->QUERY .= 'FROM ' . $this->FROM . PHP_EOL;
        if ($this->JOIN) $this->QUERY .= implode(' ' . PHP_EOL, $this->JOIN) . PHP_EOL;
        if ($this->WHERE) $this->QUERY .= 'WHERE ' . implode(PHP_EOL . 'AND ', $this->WHERE) . PHP_EOL;
        if ($this->GROUP) $this->QUERY .= 'GROUP BY ' . implode(', ', $this->GROUP) . PHP_EOL;
        if ($this->ORDER) $this->QUERY .= 'ORDER BY ' . implode(', ', $this->ORDER) . PHP_EOL;
        if ($this->LIMIT) $this->QUERY .= 'LIMIT ' . $this->LIMIT . PHP_EOL;
        if ($this->OFFSET) $this->QUERY .= 'OFFSET ' . $this->OFFSET . PHP_EOL;
        if ($this->HAVING) $this->QUERY .= 'HAVING ' . implode(PHP_EOL . 'AND ', $this->HAVING) . PHP_EOL;
        return parent::getResult();
    }
}
