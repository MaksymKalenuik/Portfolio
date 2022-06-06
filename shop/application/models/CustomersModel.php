<?php

namespace models;

use core\Model;
use core\SqlQuery;

class CustomersModel extends Model
{
    public function getAllCustomers()
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('users')
            ->run();
        return ($sql) ? $this->returnAssociativeArray($sql) : [];
    }

    public function checkValidCustomerData($inputData)
    {
        $errorMess = [];
        if (!$this->_validate->isEmailValid($inputData['email'])) {
            $errorMess[] = 'Email is not valid';
        }
        if (!$this->_validate->isPasswordValid($inputData['password'])) {
            $errorMess[] = 'Password must be at least 8 characters';
        }
        if (!$this->_validate->isPasswordsMatch($inputData['password'], $inputData['confirm_password'])) {
            $errorMess[] = 'Password must be match';
        }
        if (!$this->_validate->isPasswordCharValid($inputData['password'])) {
            $errorMess[] = 'Password must contain numeric, lower letters and upper letters';
        }
        if (!$this->_validate->isPhoneValid(($inputData['phone']))) {
            $errorMess[] = 'Phone is not valid';
        }
        if (!$this->_validate->checkALLFields($inputData)) {
            $errorMess[] = 'Enter all fields';
        }
        if (!$this->isLoginValid($inputData['login'])) {
            $errorMess[] = 'Login is busy';
        }
        //check login
        return $errorMess;
    }

    public function addCustomer($inputData)
    {
        $sql = (new sqlQuery())
            ->setType('INSERT INTO')
            ->setTable('users')
            ->setParameters([
                'login' => $inputData['login'],
                'password' => $inputData['password'],
                'email' => $inputData['email'],
                'firstname' => $inputData['firstname'],
                'lastname' => $inputData['lastname'],
                'phone' => $inputData['phone'],
                'age' => $inputData['age'],
                'sex' => $inputData['sex'],
                'country' => $inputData['country'],
                'city' => $inputData['city'],
                'address' => $inputData['address']
            ]);
        if ($sql->run()) {
            return true;
        }
        return false;
    }

    public function getCustomerById($id)
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('users')
            ->setParameters([
                'id = ' => $id
            ])
            ->setLimit(['limit' => 1])
            ->run();
        return $sql->fetch_assoc();
    }

    public function editCustomer($inputData, $id)
    {
        $sql = (new SqlQuery())
            ->setType('UPDATE')
            ->setTable('users')
            ->setUpdateParameters([
                'email = ' => $inputData['email'],
                'phone = ' => $inputData['phone'],
                'firstname = ' => $inputData['firstname'],
                'lastname = ' => $inputData['lastname'],
                'age = ' => $inputData['age'],
                'sex = ' => $inputData['sex'],
                'country = ' => $inputData['country'],
                'city = ' => $inputData['city'],
                'address = ' => $inputData['address']
            ])
            ->setParameters([
                'id = ' =>$id
            ]);
        return $sql->run();
    }

    public function deleteCustomer($id)
    {
        $sql = (new SqlQuery())
            ->setType('DELETE')
            ->setTable('users')
            ->setParameters([
                'id = ' => $id
            ]);
        return $sql->run();
    }

    public function checkValidEditCustomerData($inputData)
    {
        $errorMess = [];
        if (!$this->_validate->isEmailValid($inputData['email'])) {
            $errorMess[] = 'Email is not valid';
        }
        if (!$this->_validate->isPhoneValid(($inputData['phone']))) {
            $errorMess[] = 'Phone is not valid';
        }
        if (!$this->_validate->checkALLFields($inputData)) {
            $errorMess[] = 'Enter all fields';
        }
        return $errorMess;
    }

    private function isLoginValid($login)
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('users')
            ->setParameters([
                'login - ' => $login])
            ->run();
        $num = $sql->num_rows;
        return ($num > 0) ? false : true;
    }
}

