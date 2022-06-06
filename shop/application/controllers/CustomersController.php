<?php

namespace controllers;

use core\Controller;

class CustomersController extends Controller
{
    public function __construct($action)
    {
        parent::__construct($action);
        if (!$this->_usersAuthentication->isIssetLoggedUser()) {
            $this->_response->redirect('/kaleniyk/shop/users/index');
        }
    }

    public function listCustomers()
    {
        $Customers = $this->_model->getAllCustomers();
        $this->_view->setData(['customers' => $Customers]);
        $this->_setView('listCustomers');
    }

    public function add()
    {

        $errors = [];
        if ($this->_request->checkMethod('POST')) {
            $inputData = $this->_request->postData;
            $errors = $this->_model->checkValidCustomerData($inputData);
            if (empty($errors)) {
                $inputData['password'] = sha1($inputData['password']);
                if ($this->_model->addCustomer($inputData)) {
                    $this->_response->redirect('/kaleniyk/shop/customers/listCustomers');
                }
            }
        }
        $this->_view->setData([ 'errors' => $errors]);
        $this->_setView('add');
    }

    public function edit()
    {
        $currentId = $this->_request->getGetData()['id'];
        $currentCustomer = $this->_model->getCustomerById($currentId);

        $errors = [];
        if ($this->_request->checkMethod('POST')) {
            $inputData = $this->_request->postData;

            $errors = $this->_model->checkValidEditCustomerData($inputData);

            if (empty($errors)) {

                if ($this->_model->editCustomer($inputData, $currentId)) {
                    $this->_response->redirect('/kaleniyk/shop/customers/listCustomers');

                }
            }
        }


        $this->_view->setData(['errors' => $errors, 'currentCustomer' => $currentCustomer]);
        $this->_setView('edit');
    }

    public function delete()
    {

        $currentId = $this->_request->getGetData()['id'];
        $currentCustomer = $this->_model->getCustomerById($currentId);

        if ($this->_request->isIssetPost('yes')) {
            $this->_model->deleteCustomer($currentId);
            $this->_response->redirect('/kaleniyk/shop/customers/listCustomers');

        } else if ($this->_request->isIssetPost('no')) {
            $this->_response->redirect('/kaleniyk/shop/customers/listCustomers');
        }

        $this->_view->setData(['login' => $currentCustomer['login']]);
        $this->_setView('delete');
    }


}


?>