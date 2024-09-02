<?php
require_once 'Models/modelUser.php';
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
    public function addUser($role_name, $username, $password, $name){
        $objRole = new modelRole();
        $role = $objRole->getRoleByName($role_name);
//        print_r($role);
        $this->userModel->addUser($role, $username, $password, $name);
        header('location: MainEntryPoint.php?modul=user');
    }
}
?>
