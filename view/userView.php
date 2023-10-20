<?php
class UserView {
    public function displayUsers($users) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
        foreach ($users as $user) {
            echo "<tr><td>{$user['id']}</td><td>{$user['name']}</td><td>{$user['email']}</td><td>{$user['password']}</td></tr>";
        }
        echo "</table>";
        }
    }
   
?>