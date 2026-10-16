
<?php

class Film
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // Mengambil semua data film
    public function getAll(): array
    {
        $query = "SELECT * FROM films ORDER BY id DESC";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll();
    }


    public function getById(int $id): array|false
    {
        $query = "SELECT * FROM films WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch();
    }

    // Menambahkan data film
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

    // Memperbarui data film
    public function update(int $id, array $data): bool
    {
        $query = "UPDATE films
                  SET judul = :judul,
                      genre = :genre,
                      tahun_rilis = :tahun_rilis,
                      sutradara = :sutradara,
                      durasi = :durasi
                  WHERE id = :id";

        $stmt = $this->pdo->prepare($query);

        return $stmt->execute([
            ':id' => $id,
            ':judul' => $data['judul'],
            ':genre' => $data['genre'],
            ':tahun_rilis' => $data['tahun_rilis'],
            ':sutradara' => $data['sutradara'],
            ':durasi' => $data['durasi']
        ]);
    }
}
