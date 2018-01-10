<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 05.12.2017
 * Time: 9:40
 */

namespace Db;

class Db{
    private static $inst = null;
    private $conn = null;
    private $lastQuery = null;
    private $query = null;

    function __construct($params)
    {
        $dsn = $params['typedb'] . ':dbname=' . $params['database'] . ';host=' . $params['hostname'] . ';charset=' . $params['charset'];
        $user = $params['username'];
        $password = $params['password'];
        $this->conn = new \PDO($dsn, $user, $password);
    }
    public static function instance()
    {
        if (!self::$inst) self::$inst = new self(current(func_get_args()));
        return self::$inst;
    }
    public function query()
    {
        $this->query = \Db\SM\SQLMaker::instance();
        return $this->query;
    }
    public function execute(\Db\SM\SMInterface $query = null)
    {
        $query = $query ? $query : $this->query;
        $this->lastQuery = $query->getResult();
        $queryObj = $this->conn->query($query->getResult(), \PDO::FETCH_ASSOC);
        if (!$queryObj) return false;
        return $queryObj->fetchAll();
    }
    public function getError()
    {
        return $this->conn->errorInfo();
    }
    public function getLastQuery()
    {
        return $this->lastQuery;
    }
    public function getLastInsertId()
    {
        return $this->conn->lastInsertId();
    }
    public function closeConnection()
    {
        $this->conn = null;
        return true;
    }
}