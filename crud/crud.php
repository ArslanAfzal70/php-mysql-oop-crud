<?php

namespace PhpMysqlCrud\Crud;

include_once "database/database.php";

use PhpMysqlCrud\Database\Database;

include_once 'config/config.php';

class Crud
{

    public $host = HOST;
    public $user = USER;
    public $password = PASSWORD;
    public $database = DATABASE;

    public function addUser($data)
    {
        $databaseInstance = new Database($this->host, $this->user, $this->password, $this->database);
        $connect = $databaseInstance->getConnection();
        if (!empty($data) && $data['name']) {
            $name = $data['name'];
            $sql = "INSERT INTO user (name) VALUES ('$name')";
            $result = mysqli_query($connect, $sql);
        }
    }
    public function getAllUser()
    {
        $databaseInstance = new Database($this->host, $this->user, $this->password, $this->database);
        $connect = $databaseInstance->getConnection();
        $getAllUser = "SELECT * FROM user";
        return mysqli_query($connect, $getAllUser);
    }

    public function updateUser($data)
    {
        $databaseInstance = new Database($this->host, $this->user, $this->password, $this->database);
        $connect = $databaseInstance->getConnection();
        if (!empty($data) && $data['update_name'] && $data['update_id']) {
            $id = $data['update_id'];
            $name = $data['update_name'];
            $sql = "UPDATE user SET name = '$name' WHERE id = $id";
            $result = mysqli_query($connect, $sql);
        }
    }

    public function deleteUser($data)
    {
        $databaseInstance = new Database($this->host, $this->user, $this->password, $this->database);
        $connect = $databaseInstance->getConnection();
        if (!empty($data) && $data['update_id']) {
            $id = $data['update_id'];
            $sql = "DELETE FROM user WHERE id = $id";
            $result = mysqli_query($connect, $sql);
        }
    }
}
