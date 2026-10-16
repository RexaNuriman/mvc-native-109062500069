<?php

require_once __DIR__ . '/../models/Film.php';

class FilmController
{
    private Film $filmModel;

    public function __construct(PDO $pdo)
    {
        $this->filmModel = new Film($pdo);
    }

    // Menampilkan daftar film
    public function index(): void
    {
        $films = $this->filmModel->getAll();

        require __DIR__ . '/../views/films/index.php';
    }

    // Menampilkan form tambah film
    public function create(): void
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'judul' => trim($_POST['judul'] ?? ''),
                'genre' => trim($_POST['genre'] ?? ''),
                'tahun_rilis' => trim($_POST['tahun_rilis'] ?? ''),
                'sutradara' => trim($_POST['sutradara'] ?? ''),
                'durasi' => trim($_POST['durasi'] ?? '')
            ];

            if (
                in_array('', $data, true) ||
                !ctype_digit($data['tahun_rilis']) ||
                (int) $data['tahun_rilis'] < 1901 ||
                (int) $data['tahun_rilis'] > 2155 ||
                !ctype_digit($data['durasi']) ||
                (int) $data['durasi'] < 1
            ) {
                $error = 'Semua kolom wajib diisi dengan data yang valid.';
            } else {
                $this->filmModel->create($data);

                header('Location: index.php');
                exit;
            }
        }

        require __DIR__ . '/../views/films/create.php';
    }
}
