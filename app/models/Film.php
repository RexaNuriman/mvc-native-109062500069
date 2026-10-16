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

    public function create(array $data): bool
    {
        $query = "INSERT INTO films
                  (judul, genre, tahun_rilis, sutradara, durasi)
                  VALUES
                  (:judul, :genre, :tahun_rilis, :sutradara, :durasi)";

        $stmt = $this->pdo->prepare($query);

        return $stmt->execute([
            ':judul' => $data['judul'],
            ':genre' => $data['genre'],
            ':tahun_rilis' => $data['tahun_rilis'],
            ':sutradara' => $data['sutradara'],
            ':durasi' => $data['durasi']
        ]);
    }
}
