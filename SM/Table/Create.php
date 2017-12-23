<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 11.12.2017
 * Time: 1:36
 */

namespace Db\SM\Table;


class Create implements \Db\SM\SMInterface
{
    protected $params = array();
    public function __construct()
    {
        $this->params['columns'] = array();
        $this->params['engine'] = 'InnoDB';
        $this->params['index'] = array();
    }
    public function tabname($name)
    {
        $this->params['tabname'] = $name;
        return $this;
    }
    public function column($name)
    {
        $colObj = new Column($this, $name);
        $this->params['columns'][] = $colObj;
        return $colObj;
    }
    public function index($name)
    {
        $index = new Index($this, $name);
        $this->params['index'][] = $index;
        return $index;
    }
    public function myisam()
    {
        $this->params['engine'] = 'MyISAM';
        return $this;
    }
    public function innodb()
    {
        $this->params['engine'] = 'InnoDB';
        return $this;
    }
    public function getResult()
    {
        $sql = 'CREATE TABLE `' . $this->params['tabname'] . '`' . PHP_EOL;
        $sql .= '(' . PHP_EOL;
        $sql .= implode(' ,' . PHP_EOL, array_map(function($col){ return $col->getResult(); }, $this->params['columns']));
        if ($this->params['index']) $sql .=  ' ,' . PHP_EOL . implode(' ,' . PHP_EOL, array_map(function($col){ return $col->getResult(); }, $this->params['index']));
        $sql .= PHP_EOL . ')' . PHP_EOL;
        $sql .= 'ENGINE ' . $this->params['engine'] . ' CHARSET=utf8 COLLATE utf8_general_ci';
        return $sql;
    }
}