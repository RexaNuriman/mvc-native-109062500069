<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Film - FilmHub</title>
</head>
<body>
    <h1>Tambah Film</h1>

    <?php if (!empty($error)): ?>
        <p style="color: red;">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form action="index.php?action=create" method="POST">
        <label for="judul">Judul Film:</label><br>
        <input type="text" id="judul" name="judul" maxlength="150" required>
        <br><br>

        <label for="genre">Genre:</label><br>
        <input type="text" id="genre" name="genre" maxlength="50" required>
        <br><br>

        <label for="tahun_rilis">Tahun Rilis:</label><br>
        <input type="number" id="tahun_rilis" name="tahun_rilis" min="1901" max="2155" required>
        <br><br>

        <label for="sutradara">Sutradara:</label><br>
        <input type="text" id="sutradara" name="sutradara" maxlength="100" required>
        <br><br>

        <label for="durasi">Durasi (menit):</label><br>
        <input type="number" id="durasi" name="durasi" min="1" required>
        <br><br>

        <button type="submit">Simpan Film</button>
    </form>

    <br>
    <a href="index.php">Kembali ke Daftar Film</a>
</body>
</html>
