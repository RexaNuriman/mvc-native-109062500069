<?php

class Film
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll(): array
    {
        $query = "SELECT * FROM films ORDER BY id DESC";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll();
    }
}
