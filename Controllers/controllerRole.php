<?php

require_once 'Models/modelRole.php';

class controllerRole
{
    private $roleModel;

    public function __construct()
    {
        $this->roleModel = new modelRole();
    }

    public function listRoles()
    {
        $roles = $this->roleModel->getAllRoles();
        include 'Views/role_list.php';
    }

    public function addRole($role_name, $role_description, $role_status)
    {
        $this->roleModel->addRole($role_name, $role_description, $role_status);
        header('location: MainEntryPoint.php?modul=role');
    }

    public function editById($role_id)
    {
        $peran = $this->roleModel->getRoleById($role_id);
        include 'Views/role_update.php';
    }

    public function updateRole($id, $role_name, $role_desc, $role_Status)
    {
        $this->roleModel->updateRole($id, $role_name, $role_desc, $role_Status);
        header('location: MainEntryPoint.php?modul=role');
    }

    public function deleteRole($id){
        $cek = $this->roleModel->deleteRole($id);
        if ($cek==false){
            throw new Exception('gak onok coy');
        }else{
            header('location: MainEntryPoint.php?modul=role');
        }
    }

    public function getListRoleName(){
        $listRoleName = [];
        foreach ($this->roleModel->getAllRoles() as $role){
            $listRoleName[]=$role->role_name;
        }
        return $listRoleName;
    }
}

?>