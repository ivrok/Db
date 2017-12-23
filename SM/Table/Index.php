<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 11.12.2017
 * Time: 11:23
 */

namespace Db\SM\Table;

use Db\SM;

class Index extends CommonAbstact implements \Db\SM\SMInterface
{

    public function __construct(Create $createObj, $name)
    {
        parent::__construct($createObj);
        $this->params['column'] = $name;
    }

    public function index()
    {
        $this->params['type'] = 'INDEX';
        return $this;
    }

    public function fulltext()
    {
        $this->params['type'] = 'FULLTEXT';
        return $this;
    }

    public function spatial()
    {
        $this->params['type'] = 'SPATIAL';
        return $this;
    }

    public function primary()
    {
        $this->params['type'] = 'PRIMARY KEY';
        return $this;
    }

    public function unique()
    {
        $this->params['type'] = 'UNIQUE';
        return $this;
    }
    public function getResult()
    {
        return $this->params['type'] . '(' . $this->params['column'] . ')';
    }
}