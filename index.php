<?php

session_start();

require_once './model/userModel.php';
require_once './controller/userController.php';
require_once './view/userView.php';

$dsn = 'mysql:host=localhost:3306;dbname=test;charset=utf8';
$username = 'test';
$password = '';
$database = new PDO($dsn, $username, $password);

$userController = new UserController($database);
$userView = new UserView();

$users = $userController->getAllUsers();
$userView->displayUsers($users);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        foreach ($users as $user) {
            if ($user["email"] == $email && $user["password"] == $pwd) {
                $_SESSION["user"] = $user["id"];
            }
        }
    } else if (isset($_POST["signin"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        $userController->createUser($name, $email, $pwd);

        foreach ($users as $user) {
            if ($user["email"] == $email && $user["password"] == $pwd) {
                $_SESSION["user"] = $user["id"];
            }
        }
    } else if (isset($_POST["update"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $id = $userController->getUser($_SESSION["user"]);
        
        $userController->updateUser($id, "Jane Doe", "janedoe@example.com", "Janie jane");

        foreach ($users as $user) {
            if ($user["email"] == $email && $user["password"] == $pwd) {
                $_SESSION["user"] = $user["id"];
            }
        }
    }
}

$userController->createUser("John Doe", "johndoe@example.com", "Johnnie john");

$userController->updateUser(1, "Jane Doe", "janedoe@example.com", "Janie jane");

$userController->deleteUser(3);

$users = $userController->getAllUsers();
$userView->displayUsers($users);

/*


header("Location: Read.php");
exit;
*/
?>