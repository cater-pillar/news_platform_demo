<?php

class Article {
    private int $id;
    private int $category_id;
    private string $category;
    private int $town_id;
    private string $town;
    private string $title;
    private string $published_at;
    private string $photo;
    private string $abstract;
    private string $body;
    private array $comments = [];

    function __construct(int $id, 
                         int $category_id, 
                         int $town_id, 
                         string $title, 
                         string $published_at, 
                         string $photo, 
                         string $abstract, 
                         string $body,
                         array $categories = [],
                         array $towns = [],
                         array $comments = [])
    {
        $this->id = $id;
        $this->category_id = $category_id;
        $this->town_id = $town_id;
        $this->title = $title;
        $this->published_at = $published_at;
        $this->photo = $photo;
        $this->abstract = $abstract;
        $this->body = $body;
        foreach($categories as $category) {
            if($category->getId() == $this->category_id) {
                $this->category = $category->getName();
            }
        }
        foreach($towns as $town) {
            if($town->getId() == $this->town_id) {
                $this->town = $town->getName();
            }
        }
        foreach($comments as $comment) {
            if($comment->getArticle_id() == $this->id) {
                array_push($this->comments, $comment);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getCategory_id()
    {
        return $this->category_id;
    }
    public function setCategory_id(int $category_id)
    {
        $this->category_id = $category_id;
    }
    public function getTown_id()
    {
        return $this->town_id;
    }
    public function setTown_id(int $town_id)
    {
        $this->town_id = $town_id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    public function getPublished_at()
    {
        return $this->published_at;
    }
    public function setPublished_at(string $published_at)
    {
        $this->published_at = $published_at;
    }
    public function getPhoto()
    {
        return $this->photo;
    }
    public function setPhoto(string $photo)
    {
        $this->photo = $photo;
    }
    public function getAbstract()
    {
        return $this->abstract;
    }
    public function setAbstract(string $abstract)
    {
        $this->abstract = $abstract;
    }
    public function getBody()
    {
        return $this->body;
    }
    public function setBody(string $body)
    {
        $this->body = $body;
    }

    public function getCategory()
    {
        return $this->category;
    }
 
    public function getTown()
    {
        return $this->town;
    }

    public function getComments()
    {
        return $this->comments;
    }

    static function getArticles($prepared, $categories, $towns, $comments) {
        $articles = [];
        foreach ($prepared as $result) {
          array_push($articles, new Article($result['id'], 
                                            $result['category_id'], 
                                            $result['town_id'], 
                                            $result['title'], 
                                            $result['published_at'], 
                                            $result['photo'], 
                                            $result['abstract'], 
                                            $result['body'],
                                            $categories,
                                            $towns,
                                            $comments)
                                          );
          } return $articles;
    }

    function uploadArticle(Connection $conn) {
        $query = $conn->getConn()->prepare("INSERT INTO `article` 
        (`category_id`, `town_id`, `title`, `published_at`, `photo`, `abstract`, `body`)
        VALUES (?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param("iisssss", $this->category_id, 
                            $this->town_id, $this->title, 
                            $this->published_at, $this->photo, 
                            $this->abstract, $this->body);
        $query->execute();
    }
}