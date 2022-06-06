<?php

namespace models;

use core\Model;
use core\SqlQuery;

class FrontModel extends Model
{
    public function getAllCategories()
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('categories')
            ->run();
        return ($sql) ? $this->returnAssociativeArray($sql) : [];
    }

    public function getProductsByCategoryId($id)
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('products')
            ->setParameters([
                'category_id = ' => $id
            ])
            ->run();
        return ($sql) ? $this->returnAssociativeArray($sql) : [];
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

    public function getChildCategories($parentId)
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('categories')
            ->setParameters([
                'parent = ' => $parentId
            ])
            ->run();
        return ($sql) ? $this->returnAssociativeArray($sql) : [];
    }

    public function getProductsForWidget()
    {
        $sql = (new SqlQuery())
            ->setType('SELECT')
            ->setTable('products')
            ->setParameters(['qty > ' => 5])
            ->run();
        return ($sql) ? $this->returnAssociativeArray($sql) : [];
    }
}

?>