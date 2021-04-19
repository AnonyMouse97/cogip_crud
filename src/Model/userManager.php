<?php

declare(strict_types=1);

require_once('db_connect.php');

class UserManager extends ConnectionManager
{
    public function getUsers()
    {
        $db = $this->connect_db();

        $result = $db->prepare('SELECT adminID, userName, admin
            FROM admin
            ORDER BY userName');
        $result->execute();

        return $result->fetchAll();
    }

    public function updateUser($admin, $id)
    {
        $db = $this->connect_db();

        $result = $db->prepare('UPDATE admin
            SET admin = :admin 
            WHERE adminID = :id');
        $result->execute(['admin' => $admin, 'id' => $id]);
    }
}
