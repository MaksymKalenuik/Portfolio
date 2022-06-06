<?php

namespace models;


use core\Model;
use core\SqlQuery;

class ProductsModel extends Model
{
    public function getAllProducts()
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('products')
            ->run();
        return ($sql) ? $this->returnAssociativeArray($sql) : [];
    }

    public function getAllCategories()
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('categories')
            ->run();
        return ($sql) ? $this->returnAssociativeArray($sql) : [];
    }

    public function checkValidAddProductData($inputData)
    {
        $errors = [];
        if (!$this->_validate->checkALLFields($inputData)) {
            $errors[] = 'Please enter all fields';
        }
        if ($this->isProductsSkuValid($inputData['sku'])) {
            $errors[] = 'Use another sku';
        }
        return $errors;
    }

    public function addProduct($inputData, $author)
    {
        $sql = (new SqlQuery())
            ->setType('INSERT INTO')
            ->setTable('products')
            ->setParameters([
                'product_name' => $inputData['product_name'],
                'sku' => $inputData['sku'],
                'price' => $inputData['price'],
                'qty' => $inputData['qty'],
                'description' => $inputData['description'],
                'category_id' => $inputData['category_id'],
                'author' => $author,
                'image' => $inputData['image']
            ]);
        return $sql->run();
    }

    public function getProductById($id)
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('products')
            ->setParameters([
                'id = ' => $id
            ])
            ->setLimit(['limit' => 1])
            ->run();
        return $sql->fetch_assoc();
    }

    public function checkValidEditProductData($inputData, $sku)
    {
        $errors = [];
        if (!$this->_validate->checkALLFields($inputData)) {
            $errors[] = 'Please enter all fields';
        }
        if ($inputData['sku'] == $sku) return $errors;
        if ($this->isProductsSkuValid($inputData['sku'])) {
            $errors[] = 'Use another sku';
        }
        return $errors;
    }

    public function editProduct($inputData, $author, $id)
    {
        $sql = (new SqlQuery())
            ->setType('UPDATE')
            ->setTable('products')
            ->setUpdateParameters([
                'product_name = ' => $inputData['product_name'],
                'sku = ' => $inputData['sku'],
                'price = ' => $inputData['price'],
                'qty = ' => $inputData['qty'],
                'description = ' => $inputData['description'],
                'category_id = ' => $inputData['category_id'],
                'author = ' => $author,
                'image = ' => $inputData['image']

            ])
            ->setParameters([
                'id = ' => $id
            ]);
        return $sql->run();
    }

    public function deleteProduct($id)
    {
        $sql = (new SqlQuery())
            ->setType('DELETE')
            ->setTable('products')
            ->setParameters([
                'id = ' => $id
            ]);
        return $sql->run();
    }

    private function isProductsSkuValid($sku)
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('products')
            ->setParameters([
                'sku = ' => $sku
            ])
            ->setLimit(['limit' => 1])
            ->run();
        return ($sql->num_rows > 0) ? true : false;
    }
}