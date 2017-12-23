<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 11.12.2017
 * Time: 0:59
 */

namespace Db\SM;

use Db\SM;

class SMDelete extends SMWHEREandFROMabstract{
    public function __construct()
    {
        $this->REQ_FIELDS[] = array('name' => 'FROM', 'rule' => 'notempty');
        $this->REQ_FIELDS[] = array('name' => 'WHERE', 'rule' => 'notempty');
    }
    public function getResult()
    {
        $this->QUERY = 'DELETE FROM ' . $this->FROM;
        $this->QUERY .= PHP_EOL . 'WHERE ' . implode(PHP_EOL . 'AND ', $this->WHERE);
        return parent::create();
    }
}