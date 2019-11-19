<?php

namespace App\src\manager;

use PDO;

abstract class DAO
{

    private $connection;

    private function checkConnection()
    {
        if($this->connection === null){
            return $this->getConnection();
        }
        //si la connexion existe deja, on la retourne
        return $this->connection;
    }

    private function getConnection()
    {
        try{
            $this->connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }
        catch(Exception $errorConnection)
        {
            die('Erreur de connexion:'.$errorConnection->getMessage());
        }
    }

    protected function sql($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        else{
            $result = $this->checkConnection()->query($sql);
            return $result;
        }
    }
}