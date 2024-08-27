<?php

use Models\modelRole;

include '../Nodes/nodeUser.php';

class modelUser{
    private $users = [];
    private $nextId = 1;

    public function __construct(){
        if(isset($_SESSION['users'])){
            $this->users = unserialize($_SESSION['users']);
            $this->nextId = count($this->users) + 1;
        }else{
            $this->initiliazeDefaultUser();
        }
    }

    public function addUser($role, $username, $password, $nama){
        $user = new nodeUser($role, $this->nextId++, $username, $password, $nama);
        $this->users[] = $user;
        $this->saveToSession();
    }

    private function saveToSession(){
        $_SESSION['users'] = serialize($this->users);
    }

    public function getAllUsers(){
        return $this->users;
    }

    public function initiliazeDefaultUser(){
        $roles = new modelRole();
        $role3 = $roles->getRoleById(3);
        $role1 = $roles->getRoleById(1);
        $this->addUser($role3, "kasir1 ", "kasir1", "krisna");
        $this->addUser($role1, "admin1", "admin1", "aan");
    }
}

?>