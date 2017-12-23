<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 11.12.2017
 * Time: 1:39
 */

namespace Db\SM\Table;

use Db\SM;

class Column extends CommonAbstact implements \Db\SM\SMInterface
{
    protected $params = array();
    protected $createObj = null;

    public function __construct(Create $createObj, $name)
    {
        parent::__construct($createObj);
        $this->params['name'] = $name;
        $this->params['typeSize'] = null;
    }

    public function null()
    {
        $this->params['null'] = true;
        return $this;
    }

    public function notNull()
    {
        $this->params['null'] = false;
        return $this;
    }

    public function varchar($size = false)
    {
        $this->params['type'] = 'VARCHAR';
        if ($size) $this->params['typeSize'] = $size;
        return $this;
    }

    public function char($size = false)
    {
        $this->params['type'] = 'CHAR';
        if ($size) $this->params['typeSize'] = $size;
        return $this;
    }

    public function int()
    {
        $this->params['type'] = 'INT';
        return $this;
    }

    public function bigint()
    {
        $this->params['type'] = 'BIGINT';
        return $this;
    }

    public function mediumint()
    {
        $this->params['type'] = 'MEDIUMINT';
        return $this;
    }

    public function smallint()
    {
        $this->params['type'] = 'SMALLINT';
        return $this;
    }

    public function tinyint()
    {
        $this->params['type'] = 'TINYINT';
        return $this;
    }

    public function decimal()
    {
        $this->params['type'] = 'DECIMAL';
        return $this;
    }

    public function float()
    {
        $this->params['type'] = 'FLOAT';
        return $this;
    }

    public function double()
    {
        $this->params['type'] = 'DOUBLE';
        return $this;
    }

    public function real()
    {
        $this->params['type'] = 'REAL';
        return $this;
    }

    public function longtext()
    {
        $this->params['type'] = 'LONGTEXT';
        return $this;
    }

    public function mediumtext()
    {
        $this->params['type'] = 'MEDIUMTEXT';
        return $this;
    }

    public function text()
    {
        $this->params['type'] = 'TEXT';
        return $this;
    }

    public function tinytext()
    {
        $this->params['type'] = 'TINYTEXT';
        return $this;
    }

    public function bool()
    {
        $this->params['type'] = 'BOOLEAN';
        return $this;
    }

    public function date()
    {
        $this->params['type'] = 'DATE';
        return $this;
    }

    public function datetime()
    {
        $this->params['type'] = 'DATETIME';
        return $this;
    }

    public function binary()
    {
        $this->params['type'] = 'BINARY';
        return $this;
    }

    public function longblob()
    {
        $this->params['type'] = 'LONGBLOB';
        return $this;
    }

    public function blob()
    {
        $this->params['type'] = 'BLOB';
        return $this;
    }

    public function mediumblob()
    {
        $this->params['type'] = 'MEDIUMBLOB';
        return $this;
    }

    public function tinyblob()
    {
        $this->params['type'] = 'TINYBLOB';
        return $this;
    }

    public function defvalue($value)
    {
        $this->params['defvalue'] = $value;
        return $this;
    }
    public function autoincrement()
    {
        $this->params['autoincrement'] = true;
        return $this;
    }
    public function getResult()
    {
        $result = '`' . $this->params['name'] . '` ' . $this->params['type'] . ($this->params['typeSize'] ? '(' . $this->params['typeSize'] . ')' : '');
        if (in_array($this->params['typeSize'], array('TINYTEXT', 'TEXT', 'MEDIUMTEXT', 'LONGTEXT', 'VARCHAR', 'CHAR'))) $result .= ' CHARACTER SET ut8 COLLATE utf8_general_ci';
        $result .= ' ' . ($this->params['null'] ? 'NULL' : 'NOT NULL');
        $result .= isset($this->params['defvalue']) ? ' DEFAULT ' . $this->params['defvalue'] : '';
        $result .= isset($this->params['autoincrement']) ? ' AUTO_INCREMENT' : '';
        return $result;
    }
}