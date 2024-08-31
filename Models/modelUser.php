<?php

use Models\modelRole;

include '../Nodes/nodeUser.php';

class modelUser{
    private $users = [];
    private $nextId = 1;

    public function __construct(){
//        if(isset($_SESSION['users'])){
//            $this->users = unserialize($_SESSION['users']);
//            $this->nextId = count($this->users) + 1;
//        }else{
//            $this->initiliazeDefaultUser();
//        }
    }

    public function addUser($role, $username, $password, $nama){
        $user = new nodeUser($role, $this->nextId++, $username, $password, $nama);
        $this->users[] = $user;
        $this->saveToSession();
    }

    private function saveToSession(){
        $_SESSION['users'] = serialize($this->users);
    }

    public function getAllUsers(): array{
        return $this->users;
    }

    public function deleteUserById($userId): void{
        foreach($this->users as $key => $user){
            if($user->userId == $userId){
                unset($this->users[$key]);
                $this->saveToSession();
                break;
            }
        }
    }
}

?>