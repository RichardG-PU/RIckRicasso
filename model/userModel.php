<?php

class UserModel
{
    private $db;
    public function __construct($database)
    {
        $this->db = $database;
    }
    public function getUser($id) {
        $sql = "SELECT * FROM utilisateurs WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    public function getAllUsers()
    {
        $sql = "SELECT * FROM utilisateurs";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function createUser($name, $email, $password)
    {
        $sql = "INSERT INTO utilisateurs (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function updateUser($id, $name, $email, $password)
    {
        $sql = "UPDATE utilisateurs SET name = :name, email = :email, password = :password WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $password, PDO::PARAM_STR);
        return $stmt->execute();
    }
    public function deleteUser($id)
    {
        $sql = "DELETE FROM utilisateurs WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

?>