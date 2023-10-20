<?php
require_once './model/userModel.php';
class UserController
{
    private $model;
    public function __construct($database)
    {
        $this->model = new UserModel($database);
    }
    public function getUser($id) {
        return $this->model->getUser($id);
    }
    public function getAllUsers()
    {
        return $this->model->getAllUsers();
    }
    public function createUser($name, $email, $password)
    {
        return $this->model->createUser($name, $email, $password);
    }
    public function updateUser($id, $name, $email, $password)
    {
        return $this->model->updateUser($id, $name, $email, $password);
    }
    public function deleteUser($id)
    {
        return $this->model->deleteUser($id);
    }
}
?>