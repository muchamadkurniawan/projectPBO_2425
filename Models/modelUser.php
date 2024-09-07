<?php

require_once 'Nodes/nodeUser.php';
require_once 'modelRole.php';

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

    public function updateUser($id, $role, $username, $password, $nama){
        foreach ($this->users as $user){
            if ($user->userId == $id){
                $user->role = $role;
                $user->username = $username;
                $user->password = $password;
                $user->nama = $nama;
                $this->saveToSession();
                return true;
            }
        }
        return null;
    }

    public function deleteUser($id){
        foreach ($this->users as $key=>$user){
            if ($user->userId){
                unset($this->users[$key]);
                $this->users = array_values($this->users);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getUserById($id){
        foreach ($this->users as $user){
            if ($user->userId == $id){
                return $user;
            }
        }
        return null;
    }
}

?>