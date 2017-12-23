<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 11.12.2017
 * Time: 0:59
 */

namespace Db\SM;

use Db\SM;

abstract class SMWHEREandFROMabstract extends SMWHEREabstract{
    protected $FROM = null;
    public function from($tab, $as = false)
    {
        $this->FROM = $tab . ($as ? ' AS ' . $as : '');
        return $this;
    }
}