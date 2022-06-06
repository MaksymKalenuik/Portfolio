<?php

namespace models;

use core\Model;
use core\SqlQuery;

class CategoriesModel extends Model
{
    public function getAllCategories()
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('categories')
            ->run();
        return ($sql) ? $this->returnAssociativeArray($sql) : [];
    }

    public function checkValidCategoryData($inputData)
    {
        $errors = [];

        if (empty($inputData['category_name'])) {
            $errors[] = 'Please, enter category name';
        }
        if ($this->isCategoryNameValid($inputData['category_name'])) {
            $errors[] = 'Category name is busy';
        }
        return $errors;
    }

    public function addCategory($inputData)
    {
        $sql = (new sqlQuery())
            ->setType('INSERT INTO')
            ->setTable('categories')
            ->setParameters([
                'category_name' => $inputData['category_name'],
                'parent' => $inputData['parent']
            ]);
        return $sql->run();
    }

    public function getCategoryById($id)
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('categories')
            ->setParameters([
                'id = ' => $id
            ])
            ->setLimit(['limit' => 1])
            ->run();
        return $sql->fetch_assoc();
    }

    public function editCategory($inputData, $id)
    {
        $sql = (new SqlQuery())
            ->setType('UPDATE')
            ->setTable('categories')
            ->setUpdateParameters([
                'category_name = ' => $inputData['category_name'],
                'parent = ' => $inputData['parent']
            ])
            ->setParameters([
                'id = ' => $id
            ]);
        return $sql->run();
    }

    public function deleteCategory($id)
    {
        $sql = (new SqlQuery())
            ->setType('DELETE')
            ->setTable('categories')
            ->setParameters([
                'id = ' => $id
            ]);
        return $sql->run();
    }

    private function isCategoryNameValid($categoryName)
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('categories')
            ->setParameters([
                'category_name = ' => $categoryName
            ])
            ->setLimit(['limit' => 1])
            ->run();
        return ($sql->num_rows > 0) ? true : false;
    }
}

