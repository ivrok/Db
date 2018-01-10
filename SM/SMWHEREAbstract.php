<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 05.12.2017
 * Time: 21:34
 */

namespace Db\SM;

use Db\SM;

abstract class SMWHEREabstract extends SMabstract
{
    protected $WHERE = array();

    public function where($parName, $parValue, $operation = '=')
    {
        $parValue = $this->transformTextValue($parValue);
        $this->WHERE[] = $parName . ' ' . $operation . ' ' . $parValue;
        return $this;
    }

    public function whereCustom($where)
    {
        $this->WHERE[] = $where;
        return $this;
    }

    public function whereBetween($parName, $parValue, $parValue2)
    {
        $parValue = $this->transformTextValue($parValue);
        $parValue2 = $this->transformTextValue($parValue2);
        $this->WHERE[] = $parName . ' BETWEEN ' . $parValue . ' AND ' . $parValue2;
        return $this;
    }

    public function whereInQuery($parName, SMSelect $query)
    {
        $this->WHERE[] = $parName . ' IN (' . $query->getResult() . ')';
        return $this;
    }
    public function whereIn($parName, Array $parValues)
    {
        $parValues = array(array($this, 'transformTextValue'), $parValues);
        $this->WHERE[] = $parName . ' IN (' . (implode(', ', $parValues)) . ')';
        return $this;
    }
}