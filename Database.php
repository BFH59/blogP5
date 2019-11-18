<?php


abstract class Database
{
    const DB_HOST = 'mysql:host=127.0.0.1:8889;dbname=blogP5;charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = 'root';

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
            $this->connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
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