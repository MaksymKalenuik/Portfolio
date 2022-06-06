<?php

namespace core;

class SqlQuery {
    public $sql = '';
    /** @var \mysqli */
    private $_db;
    private $_type;
    private $_table;
    private $_fields = '*';
    private $_parameters;
    private $_queryParameters;
    private $_updateParameters;
    private $_whereParameters;
    private $_whereOperations;
    private $_limit = '';

    public function __construct() {
        $this->_db = new Database();
    }

    /**
     * set query type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type) {
        $this->_type = $type;
        return $this;
    }

    /**
     * set fields
     *
     * @param string $fields
     * @return $this
     */
    public function setFields($fields) {
        $this->_fields = implode(', ', $fields);
        return $this;
    }

    /**
     * set table
     *
     * @param string $table
     * @return $this
     */
    public function setTable($table) {
        $this->_table = $table;
        return $this;
    }

    /**
     * set parameters for query
     *
     * @param array $parameters
     * @return $this
     */
    public function setParameters($parameters) {
        $this->_parameters = $parameters;
        if ($this->_type == 'SELECT' || $this->_type == 'UPDATE' || $this->_type == 'DELETE'){
            $this->_whereParameters .= ' WHERE ' . key($this->_parameters) .' ?';
            if (count($this->_parameters) > 1) {
                for ($i = 1; $i < count($this->_parameters); $i++) {
                    next($this->_parameters);
                    $this->_whereParameters .= $this->_whereOperations[$i - 1] . key($this->_parameters) . ' ?';
                }
            }
        } elseif ($this->_type == 'INSERT INTO'){
            $this->_queryParameters = array_fill(0, count($this->_parameters), '?');
            $this->_queryParameters = implode(', ', $this->_queryParameters);
        }
        return $this;
    }

    /**
     * set where operations
     *
     * @param $whereOperations
     * @return $this
     */
    public function setWhereOperations($whereOperations) {
        $this->_whereOperations = $whereOperations;
        return $this;
    }

    /**
     * set update parameters
     *
     * @param $updateParameters
     * @return $this
     */
    public function setUpdateParameters($updateParameters){
        $this->_updateParameters = $updateParameters;
        return $this;
    }

    /**
     * set limit parameters
     *
     * @param array $limit
     * @return $this
     */
    public function setLimit($limit) {
        if (empty($limit['limit'])){
            echo 'Limit for query is empty';
        }
        $this->_limit = ' LIMIT ' . $limit['limit'];
        if(!empty($limit['start'])){
            $this->_limit = ' LIMIT ' . $limit['start'] . ', ' . $limit['limit'];
        }
        return $this;
    }

    /**
     * run select, insert, update, delete methods
     *
     * @return bool
     */
    public function run() {
        if ($this->_type == 'SELECT'){
            $this->_generateSelectQuery();
        } elseif ($this->_type == 'INSERT INTO'){
            $this->_generateInsertQuery();
        } elseif ($this->_type == 'UPDATE'){
            $this->_generateUpdateQuery();
            $this->_parameters = array_merge($this->_updateParameters, $this->_parameters);
        } elseif ($this->_type == 'DELETE') {
            $this->_generateDeleteQuery();
        } else {
            echo 'Wrong query type';
        }
        return $this->_runPrepareStatement();
    }


    /**
     * run prepare statement
     *
     * @return bool|\mysqli_result
     */
    private function _runPrepareStatement() {
        /** @var \mysqli_stmt $stmt */
        if(!($stmt = $this->_db->connection->prepare($this->sql))) {
            echo $this->_db->connection->error;
        }
        if (!empty($this->_parameters)) {
            $this->_returnBindParamFunctionCallWithDynamicValues($stmt, $this->_parameters);
        }
        if (!$stmt->execute()){
            echo $this->_db->connection->error;
        }
        if ($this->_type == 'SELECT'){
            return $stmt->get_result();
        } elseif ($this->_type == 'INSERT INTO' || $this->_type == 'UPDATE' || $this->_type == 'DELETE'){
            return true;
        } else {
            echo 'Wrong query type';
        }
    }

    /**
     * generate select query
     *
     * @return string
     */
    private function _generateSelectQuery() {
        $this->sql = $this->_type . ' ' . $this->_fields . ' FROM ' . $this->_table . $this->_whereParameters . $this->_limit;
    }

    /**
     * generate insert query
     *
     * @return string
     */
    private function _generateInsertQuery() {
        $this->setFields(array_keys($this->_parameters));
        $this->sql = $this->_type . ' ' . $this->_table . ' (' . $this->_fields . ') VALUES ( ' . $this->_queryParameters . ')';
    }

    /**
     * generate update query
     *
     * @return string
     */
    private function _generateUpdateQuery() {
        $this->_setUpdateParameters();
        $this->sql = $this->_type . ' ' . $this->_table . ' SET ' . $this->_queryParameters . $this->_whereParameters;
    }

    private function _generateDeleteQuery() {
        $this->sql = $this->_type . ' FROM ' . $this->_table . $this->_whereParameters;
    }

    /**
     * set update bind parameters
     */
    private function _setUpdateParameters() {
        $fields = array_keys($this->_updateParameters);
        $bind = [];
        foreach($fields as $field) {
            $bind[] = $field . '?';
        }
        $this->_queryParameters = implode(', ', $bind);
    }

    /**
     * return bind param function call with dynamic values
     *
     * @param \mysqli_stmt $stmt
     * @param array $array
     * @return mixed
     */
    private function _returnBindParamFunctionCallWithDynamicValues($stmt, $array) {
        $values = array();
        $bindParam = '';
        if (!empty($array)){
            foreach ($array as $key => $value) {
                $type = gettype($value);
                $bindParam .= $type[0];
                $values[] = & $array[$key];
            }
        }
        array_unshift($values, $bindParam);
        return call_user_func_array(array($stmt, 'bind_param'), $values);
    }
}