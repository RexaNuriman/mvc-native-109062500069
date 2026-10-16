<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Film - FilmHub</title>
</head>
<body>
    <h1>Edit Film</h1>

    <?php if (!empty($error)): ?>
        <p style="color: red;">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form action="index.php?action=edit&id=<?= (int) $film['id'] ?>" method="POST">
        <label for="judul">Judul Film:</label><br>
        <input
            type="text"
            id="judul"
            name="judul"
            maxlength="150"
            value="<?= htmlspecialchars($film['judul']) ?>"
            required
        >
        <br><br>

        <label for="genre">Genre:</label><br>
        <input
            type="text"
            id="genre"
            name="genre"
            maxlength="50"
            value="<?= htmlspecialchars($film['genre']) ?>"
            required
        >
        <br><br>

        <label for="tahun_rilis">Tahun Rilis:</label><br>
        <input
            type="number"
            id="tahun_rilis"
            name="tahun_rilis"
            min="1901"
            max="2155"
            value="<?= htmlspecialchars((string) $film['tahun_rilis']) ?>"
            required
        >
        <br><br>

        <label for="sutradara">Sutradara:</label><br>
        <input
            type="text"
            id="sutradara"
            name="sutradara"
            maxlength="100"
            value="<?= htmlspecialchars($film['sutradara']) ?>"
            required
        >
        <br><br>

        <label for="durasi">Durasi (menit):</label><br>
        <input
            type="number"
            id="durasi"
            name="durasi"
            min="1"
            value="<?= htmlspecialchars((string) $film['durasi']) ?>"
            required
        >
        <br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="index.php">Kembali ke Daftar Film</a>
</body>
</html>
