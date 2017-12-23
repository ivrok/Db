<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 11.12.2017
 * Time: 11:39
 */

namespace Db\SM\Database;

use Db\SM;

class CommonAbstact
{
    protected $createObj = null;
    protected $params = array();

    public function __construct(SM\SMDatabase $createObj)
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