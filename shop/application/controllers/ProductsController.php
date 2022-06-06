<?php

namespace controllers;


use core\Controller;

class ProductsController extends Controller
{
    public function __construct($action)
    {
        parent::__construct($action);
        if (!$this->_usersAuthentication->isIssetLoggedUser()) {
            $this->_response->redirect('/kaleniyk/shop/users/index');
        }
    }

    public function listProducts()
    {
        $products = $this->_model->getAllProducts();

        $this->_view->setData(['products' => $products]);
        $this->_setView('listProducts');
    }

    public function add()
    {
        $categories = $this->_model->getAllCategories();
        $errors = [];
        if ($this->_request->checkMethod('POST')) {
            $inputData = $this->_request->postData;
            $uploadResult=$this->_uploader->upload($_FILES['images']);
            $inputData['image']=$uploadResult;
            $errors = $this->_model->checkValidAddProductData($inputData);
            if (empty($errors)) {
                if ($this->_model->addProduct($inputData, $this->_usersAuthentication->getLoggedUserLogin())) {
                    $this->_response->redirect('/kaleniyk/shop/products/listProducts');

                }
            }
        }


        $this->_view->setData(['categories' => $categories, 'errors' => $errors]);
        $this->_setView('add');
    }

    public function edit()
    {
        $currentId = $this->_request->getGetData()['id'];
        $currentProduct = $this->_model->getProductById($currentId);
        $categories = $this->_model->getAllCategories();
        $errors = [];
        if ($this->_request->checkMethod('POST')) {
            $inputData = $this->_request->postData;

            $uploadResult = $this->_uploader->upload($_FILES['images']);
            if (!empty($uploadResult)) {
                $inputData['image'] = $uploadResult;
            }
            $errors = $this->_model->checkValidEditProductData($inputData, $currentProduct['sku']);

            if (empty($errors)) {
                if ($this->_model->editProduct($inputData, $this->_usersAuthentication->getLoggedUserLogin(), $currentId)) {
                    $this->_response->redirect('/kaleniyk/shop/products/listProducts');

                }
            }
        }


        $this->_view->setData(['categories' => $categories, 'errors' => $errors, 'currentProduct' => $currentProduct]);
        $this->_setView('edit');
    }

    public function delete()
    {
        $currentId = $this->_request->getGetData()['id'];
        $currentProduct = $this->_model->getProductbyId($currentId);
        if ($this->_request->isIssetPost('yes')) {
            $this->_model->deleteProduct($currentId);
            $this->_response->redirect('/kaleniyk/shop/products/listProducts');
        } else if ($this->_request->isIssetPost('no')) {
            $this->_response->redirect('/kaleniyk/shop/products/listProducts');
        }
        $this->_view->setData(['productName' => $currentProduct['product_name']]);
        $this->_setView('delete');
    }
}