<?php

class Comment {
    private int $id;
    private int $article_id;
    private int $user_id;
    private string $user;
    private string $body;
    private string $published_at;

    function __construct(int $id, 
                         int $article_id, 
                         int $user_id, 
                         string $body,
                         string $published_at,
                         array $users)
    {
        $this->id = $id;
        $this->article_id = $article_id;
        $this->user_id = $user_id;
        $this->body = $body;
        $this->published_at = $published_at;
        foreach($users as $user) {
            if($user->getId() == $this->user_id) {
                $this->user = $user->getUsername();
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function getArticle_id()
    {
        return $this->article_id;
    }
    public function setArticle_id(int $article_id)
    {
        $this->article_id = $article_id;
    }
    public function getUser_id()
    {
        return $this->user_id;
    }
    public function setUser_id(int $user_id)
    {
        $this->user_id = $user_id;
    }
    public function getBody()
    {
        return $this->body;
    }
    public function setBody(string $body)
    {
        $this->body = $body;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Get the value of published_at
     */ 
    public function getPublished_at()
    {
        return $this->published_at;
    }

    static function getComments($conn, $users) {
        $comments = [];

foreach ($conn->getComments() as $result) {
    array_push($comments, new Comment($result['id'], 
                                     $result['article_id'], 
                                     $result['user_id'], 
                                     $result['body'],
                                     $result['published_at'],
                                     $users)
                                    );
    }
    return $comments;

    }
}