<?php

class Connection
{
    public PDO $pdo;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=db;dbname=notes','root','rootpassword');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getNotes(): array
    {
        $statement = $this->pdo->prepare('SELECT * FROM notes ORDER BY create_date DESC');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}