<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 05.12.2017
 * Time: 21:34
 */

namespace SqlConst\SM;

use SqlConst\SM;

abstract class SMabstract implements SMInterface{
    protected $QUERY = null;
    protected $REQ_FIELDS = array();
    protected function transformTextValue($parValue)
    {
        return is_numeric($parValue) ? $parValue : $parValue = '"' . $parValue . '"';
    }
    public function getResult()
    {
        $this->checkRequiredFields();
        return $this->QUERY;
    }
    //if something wrong it will throw fatal error
    protected function checkRequiredFields()
    {
        foreach ($this->REQ_FIELDS as $rfield) {
            switch ($rfield['rule']) {
                case 'notempty' :
                default:
                    if (!isset($this->{$rfield['name']}) || empty($this->{$rfield['name']}))
                        throw new \Exception($rfield['name'] . ' is empty');
            }
        }

    }
    public function __toString()
    {
        return $this->getResult();
    }
}