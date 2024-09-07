<?php
require_once 'Models/modelUser.php';
class controllerUser{
    private $userModel;
    public function __construct(){
        $this->userModel = new modelUser();
    }

    public function listUser(){
        $users = $this->userModel->getAllUsers();
        include 'Views/user_list.php';
    }
    public function addUser($role, $username, $password, $name){
        $this->userModel->addUser($role, $username, $password, $name);
        header('location:MainEntryPoint.php?modul=user');
    }
}
?>
