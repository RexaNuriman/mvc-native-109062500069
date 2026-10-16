<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FilmHub - Daftar Film</title>
</head>
<body>
    <h1>Daftar Film</h1>

    <p>
        <a href="index.php?action=create">Tambah Film</a>
    </p>

    <?php if (empty($films)): ?>
        <p>Belum ada data film.</p>
    <?php else: ?>
        <table border="1" cellpadding="8">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Genre</th>
                    <th>Tahun Rilis</th>
                    <th>Sutradara</th>
                    <th>Durasi (menit)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($films as $film): ?>
                    <tr>
                        <td><?= htmlspecialchars($film['judul']) ?></td>
                        <td><?= htmlspecialchars($film['genre']) ?></td>
                        <td><?= htmlspecialchars((string) $film['tahun_rilis']) ?></td>
                        <td><?= htmlspecialchars($film['sutradara']) ?></td>
                        <td><?= htmlspecialchars((string) $film['durasi']) ?></td>
                        <td>
                            <a href="index.php?action=edit&id=<?= (int) $film['id'] ?>">
                                Edit
                            </a>

                            <form
                                action="index.php?action=delete"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus film ini?')"
                                style="display: inline;"
                            >
                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?= (int) $film['id'] ?>"
                                >
                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
