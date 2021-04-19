<?php

declare(strict_types=1);



class ConnectionManager
{
    protected function connect_db()
    {
        //env vars
        $dbUsername = getenv('DB_NAME');
        $dbPassword = getenv('DB_PASSWORD');
        
        try {
            $db = new PDO("mysql:host=remotemysql.com;dbname=$dbUsername;port=3306", "$dbUsername", "$dbPassword"  );
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}

