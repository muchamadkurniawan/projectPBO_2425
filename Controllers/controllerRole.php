<?php

require_once 'Models/modelRole.php';

class controllerRole{
    private $roleModel;

    public function __construct(){
        $this->roleModel = new \Models\modelRole();
    }

    public function listRoles(){
        $roles = $this->roleModel->getAllRoles();
        include 'Views/role_list.php';
    }

    public function addRole($role_name,$role_description,$role_status){
        $this->roleModel->addRole($role_name, $role_description, $role_status);
        header('location: RoleEntryPoint.php');
    }
}
?>