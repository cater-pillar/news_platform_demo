<?php

class Category {
    private int $id;
    private string $name;

    function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    
    public function getId()
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }

    static function getCategories(Connection $conn) {
        $categories = [];

    foreach ($conn->getCategories() as $result) {
        array_push($categories, new Category($result['id'], $result['name']));
      }
      return $categories;
    } 
}