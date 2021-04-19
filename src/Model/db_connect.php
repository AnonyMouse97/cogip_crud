<?php

declare(strict_types=1);

class ConnectionManager
{
    protected function connect_db()
    {
        try {
            $db = new PDO("mysql:host=remotemysql.com;dbname=" . $_ENV['id'] . ";port=3306", $_ENV['id'], $_ENV['password']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
