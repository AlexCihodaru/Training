<?php

require_once 'config.php';

class Dbh
{
    private $servername;
    private $username;
    private $password;
    private $db;

    public function connect()
    {
        $this->servername=server;
        $this->username=username;
        $this->password=password;
        $this->db=database;

        try {
            $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->db;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
            catch (PDOException $e)
            {
                echo "Connectino failed: ".$e->getMessage();

            }

        }

    }





