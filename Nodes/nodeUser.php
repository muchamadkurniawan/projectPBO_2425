<?php

class nodeUser
{
    public $role;
    public $userId;
    public $username;
    public $password;
    public $name;
    public $saldo=0;

    public function __construct($role,$userId ,$username, $password, $nama)
    {
        $this->role = $role;
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
        $this->name = $nama;
    }
}

?>