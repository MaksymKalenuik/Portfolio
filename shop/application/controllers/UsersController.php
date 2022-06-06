<?php

namespace controllers;

use core\Controller;

class UsersController extends Controller
{

    public function index()
    {
        $errorMess = [];
        if ($this->_request->checkMethod('POST')) {
            $inputData = $this->_request->postData;
            $errorMess = $this->_model->checkValidLoginData($inputData);
            if (empty($errorMess)) {
                $inputData['password'] = sha1($inputData['password']);
                if ($this->_usersAuthentication->logIn($inputData)) {
                    $this->_response->redirect('/kaleniyk/shop/users/account');
                }

            }
        }

        $this->_view->setData(['errors' => $errorMess]);
        $this->_setView('index');
    }

    public function registration()
    {
        $errorMess = [];
        if ($this->_request->checkMethod('POST')) {
            $inputData = $this->_request->postData;
            $errorMess = $this->_model->checkValidRegistrData($inputData);
            if (empty($errorMess)) {
                $inputData['password'] = sha1($inputData['password']);
                if ($this->_model->signUp($inputData)) {
                    if ($this->_usersAuthentication->logIn($inputData)) {
                        $this->_response->redirect('/kaleniyk/shop/users/account');
                    }

                }
            }
        }

        $this->_view->setData(['errors' => $errorMess]);
        $this->_setView('registration');
    }

    public function account()
    {

        if (!$this->_usersAuthentication->isIssetLoggedUser()) {
            $this->_response->redirect('/kaleniyk/shop/users/index');
        }
        $userData = $this->_usersAuthentication->getLoggedUserData();
        $isAdmin = $this->_usersAuthentication->isUserAdmin();
        $this->_view->setData(['userData' => $userData, 'isAdmin' => $isAdmin]);
        $this->_setView('account');
    }

    public function edit()
    {

        if (!$this->_usersAuthentication->isIssetLoggedUser()) {
            $this->_response->redirect('/kaleniyk/shop/users/index');
        }
        $userData = $this->_usersAuthentication->getLoggedUserData();
        $errorMess = [];
        if ($this->_request->checkMethod('POST')) {
            $inputData = $this->_request->postData;
            $errorMess = $this->_model->checkValidEditData($inputData);
            if (empty($errorMess)) {
                if ($this->_model->editUser($inputData, $userData['login'])) {
                    $this->_usersAuthentication->updateLoggedUserData($userData);
                    $this->_response->redirect('/kaleniyk/shop/users/account');
                }

            }
        }

        $this->_view->setData(['errors' => $errorMess, 'userData' => $userData]);
        $this->_setView('edit');
    }

    public function logout() {
        if (!$this->_usersAuthentication->isIssetLoggedUser()) {
            $this->_response->redirect('/kaleniyk/shop/users/index');
        }

        if ($this->_request->isIssetPost('yes')) {
            $this->_usersAuthentication->logout();
            $this->_response->redirect('/kaleniyk/shop/users/index');
        } else if($this->_request->isIssetPost('no')) {
            $this->_response->redirect('/kaleniyk/shop/users/account');
        }
        $this->_view->setData([]);
        $this->_setView('logout');
    }
}
