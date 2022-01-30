<?php

class User {
    private int $id;
    private string $username;
    private string $email;
    private string $password;

    function __construct(int $id, string $username, string $email, string $password)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername(string $username)
    {
        $this->username = $username;

    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    static function getUsers(Connection $conn) {

    $users = [];

    foreach ($conn->getUsers() as $result) {
        array_push($users, new User($result['id'],
                                    $result['username'],
                                    $result['email'],
                                    $result['password']));
                }
              return $users;

    }
}