<?php

namespace core;

class Database {
    /**
     * @var \mysqli
     */
    public $connection;

    public function __construct() {
        $this->connection();
    }

    /**
     * connecting to database
     *
     * @return \mysqli
     */
    public function connection() {
        $this->connection = new \mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_NAME_DATABASE);
        if($this->connection->connect_errno) {
            echo $this->connection->connect_error;
        }
    }

    public function disconnect() {

    }
}
