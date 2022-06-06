<?php

namespace controllers;

use core\Controller;

class CategoriesController extends Controller
{
    public function listCategories()
    {
        if (!$this->_usersAuthentication->isIssetLoggedUser()) {
            $this->_response->redirect('/kaleniyk/shop/users/index');
        }
        $categories = $this->_model->getAllCategories();
        $this->_view->setData(['categories' => $categories]);
        $this->_setView('listCategories');
    }

    public function add()
    {
        if (!$this->_usersAuthentication->isIssetLoggedUser()) {
            $this->_response->redirect('/kaleniyk/shop/users/index');
        }
        $categories = $this->_model->getAllCategories();
        $errors = [];
        if ($this->_request->checkMethod('POST')) {
            $inputData = $this->_request->postData;
            $errors = $this->_model->checkValidCategoryData($inputData);
            if (empty($errors)) {
                if ($this->_model->addCategory($inputData)) {
                    $this->_response->redirect('/kaleniyk/shop/categories/listCategories');

                }
            }
        }


        $this->_view->setData(['categories' => $categories, 'errors' => $errors]);
        $this->_setView('add');
    }

    public function edit()
    {
        if (!$this->_usersAuthentication->isIssetLoggedUser()) {
            $this->_response->redirect('/kaleniyk/shop/users/index');
        }
        $categories = $this->_model->getAllCategories();
        $currentId = $this->_request->getGetData()['id'];
        $currentCategory = $this->_model->getCategoryById($currentId);

        $errors = [];
        if ($this->_request->checkMethod('POST')) {
            $inputData = $this->_request->postData;
            if ($inputData['category_name'] != $currentCategory['Category_name']) {

                $errors = $this->_model->checkValidCategoryData($inputData);
            }
            if (empty($errors)) {
                if ($this->_model->editCategory($inputData, $currentId)) {
                    $this->_response->redirect('/kaleniyk/shop/categories/listCategories');

                }
            }
        }


        $this->_view->setData(['categories' => $categories, 'errors' => $errors, 'currentCategory' => $currentCategory]);
        $this->_setView('edit');
    }

    public function delete()
    {
        if (!$this->_usersAuthentication->isIssetLoggedUser()) {
            $this->_response->redirect('/kaleniyk/shop/users/index');
        }
        $currentId = $this->_request->getGetData()['id'];
        $currentCategory = $this->_model->getCategoryById($currentId);

        if ($this->_request->isIssetPost('yes')) {
            $this->_model->deleteCategory($currentId);
            $this->_response->redirect('/kaleniyk/shop/categories/listCategories');

        }
        else if($this->_request->isIssetPost('no')) {
            $this->_response->redirect('/kaleniyk/shop/categories/listCategories');
        }

        $this->_view->setData(['categoryName' => $currentCategory['category_name']]);
        $this->_setView('delete');
    }

}









