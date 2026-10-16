<?php

require_once __DIR__ . '/../models/Film.php';

class FilmController
{
    private Film $filmModel;

    public function __construct(PDO $pdo)
    {
        $this->filmModel = new Film($pdo);
    }

    public function index(): void
    {
        $films = $this->filmModel->getAll();

        require __DIR__ . '/../views/films/index.php';
    }


    private function validate(array $data): string
    {
        if (
            $data['judul'] === '' ||
            $data['genre'] === '' ||
            $data['tahun_rilis'] === '' ||
            $data['sutradara'] === '' ||
            $data['durasi'] === ''
        ) {
            return 'Semua kolom wajib diisi.';
        }

        if (
            !ctype_digit($data['tahun_rilis']) ||
            (int) $data['tahun_rilis'] < 1901 ||
            (int) $data['tahun_rilis'] > 2155
        ) {
            return 'Tahun rilis tidak valid.';
        }

        if (!ctype_digit($data['durasi']) || (int) $data['durasi'] < 1) {
            return 'Durasi harus berupa angka positif.';
        }

        return '';
    }

    public function create(): void
    {
        $error = '';
        $data = [
            'judul' => '',
            'genre' => '',
            'tahun_rilis' => '',
            'sutradara' => '',
            'durasi' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($data as $key => $value) {
                $data[$key] = trim((string) ($_POST[$key] ?? ''));
            }

            $error = $this->validate($data);

            if ($error === '') {
                $this->filmModel->create($data);

                header('Location: index.php');
                exit;
            }
        }

        require __DIR__ . '/../views/films/create.php';
    }

    public function edit(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id || $id < 1) {
            http_response_code(400);
            exit('ID film tidak valid.');
        }

        $film = $this->filmModel->getById($id);

        if (!$film) {
            http_response_code(404);
            exit('Film tidak ditemukan.');
        }

        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];

            foreach (
                ['judul', 'genre', 'tahun_rilis', 'sutradara', 'durasi']
                as $key
            ) {
                $data[$key] = trim((string) ($_POST[$key] ?? ''));
            }

            $error = $this->validate($data);

            if ($error === '') {
                $this->filmModel->update($id, $data);

                header('Location: index.php');
                exit;
            }

            $film = array_merge($film, $data);
        }

        require __DIR__ . '/../views/films/edit.php';
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            exit('Metode tidak diizinkan.');
        }

        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if (!$id || $id < 1) {
            http_response_code(400);
            exit('ID film tidak valid.');
        }

        $film = $this->filmModel->getById($id);

        if (!$film) {
            http_response_code(404);
            exit('Film tidak ditemukan.');
        }

        $this->filmModel->delete($id);

        header('Location: index.php');
        exit;
    }
}
