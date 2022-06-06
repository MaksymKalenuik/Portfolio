<?php

namespace controllers;

use core\Controller;

class FrontController extends Controller
{
    public function home()
    {
        $categories = $this->_model->getAllCategories();
        $products = $this->_model->getProductsForWidget();

        $this->_view->setData(['categories' => $categories, 'products' => $products]);
        $this->_setView('home');
    }


    public function categories() {
        $categories = $this->_model->getAllCategories();

        $this->_view->setData(['categories' => $categories]);
        $this->_setView('categories');
    }


    public function view()
    {
        $currentId = $this->_request->getGetData()['id'];
        $products = $this->_model->getProductsByCategoryId($currentId);
        $currentCategory = $this->_model->getCategoryById($currentId);
        $childrenCategories = $this->_model->getChildCategories($currentId);

        $this->_view->setData(['products' => $products, 'categoryName' => $currentCategory['category_name'], 'childrenCategories' => $childrenCategories]);
        $this->_setView('view');
    }

    public function viewProduct()
    {
        $currentId = $this->_request->getGetData()['id'];
        $product = $this->_model->getProductById($currentId);

        $this->_view->setData(['product' => $product]);
        $this->_setView('viewProduct');
    }

    public function about()
    {
        $this->_view->setData([]);
        $this->_setView('about');
    }
    public function contact()
    {
        $this->_view->setData([]);
        $this->_setView('contact');
    }
}

?>