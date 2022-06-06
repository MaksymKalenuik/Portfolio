<?php

namespace components;

use core\SessionManipulation;
use models\UsersModel;

class UsersAuthentication
{

    public $idLoggedUser;
    private $_sessionManipulation;
    private $_usersModel;

    public function __construct()
    {
        $this->_sessionManipulation = new SessionManipulation();
        $this->_usersModel = new UsersModel();
    }

    public function logIn($inputData)
    {
        $row = $this->_usersModel->getUserDataByLoginAndPassword($inputData);
        if (!empty($row)) {
            unset($row['password']);
            $this->_sessionManipulation->recordInformation('loggedUser', $row);
            return true;
        }
        return false;
    }

    public function getLoggedUserData()
    {
        return $this->_sessionManipulation->getSection('loggedUser');
    }

    public function isIssetLoggedUser()
    {
        return !empty($this->_sessionManipulation->getSection('loggedUser'));
    }

    public function getLoggedUserLogin()
    {
        return $this->_sessionManipulation->getSection('loggedUser')['login'];
    }

    public function logout()
    {
        $this->_sessionManipulation->unsetSection('loggedUser');
    }

    public function updateLoggedUserData($inputData)
    {
        $row = $this->_usersModel->getUserDataByLogin($inputData['login']);
        unset($row['password']);
        $this->_sessionManipulation->recordInformation('loggedUser', $row);
    }

    public function isUserAdmin()
    {
        return $this->getLoggedUserLogin() == 'admin';
    }


}





