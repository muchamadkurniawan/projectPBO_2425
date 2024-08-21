<?php

class nodeUser
{
    public $role; // object Role

    public $userId;
    public $username;
    public $password;
    public $nama;
    public $saldo=0;

    public function __construct($role,$userId ,$username, $password, $nama)
    {
        $this->role = $role;
        $this->userId = $userId;
        $this->username = $username;
        $this->password = $password;
        $this->nama = $nama;
    }
}

?>