<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$cid) {
  $_SESSION['flash_gagal'] = 'Akses tidak valid.';
  redirect_ke('biodata.php');
}

$stmt = mysqli_prepare($conn, "SELECT cid, cnim, cnamalengkap, ctempatlahir, ctanggallahir, chobi, cpasangan, cpekerjaan, cnamaortu, cnamakakak, cnamaadik
FROM tbl_biodata_mahasiswa WHERE cid = ? LIMIT 1");
if (!$stmt) {
  $_SESSION['flash_gagal'] = 'Query tidak benar.';
  redirect_ke('biodata.php');
}

mysqli_stmt_bind_param($stmt, "i", $cid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
  $_SESSION['flash_gagal'] = 'Record tidak ditemukan.';
  redirect_ke('biodata.php');
}

$nim = $row['cnim'] ?? "";
$namalengkap = $row["cnamalengkap"] ?? "";
$tempatlhr = $row["ctempatlahir"] ?? "";
$tanggallhr = $row["ctanggallahir"] ?? "";
$hobi = $row["chobi"] ?? "";
$pasangan = $row["cpasangan"] ?? "";
$pekerjaan = $row["cpekerjaan"] ?? "";
$ortu = $row["cnamaortu"] ?? "";
$kakak = $row["cnamakakak"] ?? "";
$adik = $row["cnamaadik"] ?? "";
$flash_gagal = $_SESSION['flash_gagal'] ?? '';
$old = $_SESSION['old'] ?? [];
unset($_SESSION['flash_gagal'], $_SESSION['old']);

if (!empty($old)) {
  $nim = $old['nim'] ?? $nim;
  $namalengkap = $old['namalengkap'] ?? $namalengkap;
  $tempatlhr = $old['tempatlahir'] ?? $tempatlhr;
  $tanggallhr = $old['tanggallahir'] ?? $tanggallhr;
  $hobi = $old['hobi'] ?? $hobi;
  $pasangan = $old['pasangan'] ?? $pasangan;
  $pekerjaan = $old['pekerjaan'] ?? $pekerjaan;
  $ortu = $old['namaortu'] ?? $ortu;
  $kakak = $old['namakakak'] ?? $kakak;
  $adik = $old['namaadik'] ?? $adik;
}
?>

<?php
$_SESSION["Jawaban"] = 5;
$a = 2;
$b = 3;
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">&#9776;</button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="biodata">
      <h2>Edit Biodata</h2>

      <?php if (!empty($flash_gagal)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_gagal; ?>
        </div>
      <?php endif; ?>

      <form action="biodata_proses_update.php" method="POST">
        <input type="hidden" name="cid" value="<?= $cid ?>">


        <label><span>NIM:</span>
          <input type="text" name="txtnim" value="<?= $nim ?>">
        </label>

        <label><span>Nama Lengkap:</span>
          <input type="text" name="txtnamalengkap" value="<?= $namalengkap ?>">
        </label>

        <label><span>Tempat Lahir:</span>
          <input type="text" name="txttempatlahir" value="<?= $tempatlhr ?>">
        </label>

        <label><span>Tanggal Lahir:</span>
          <input type="text" name="txttanggallahir" value="<?= $tanggallhr ?>">
        </label>

        <label><span>Hobi:</span>
          <input type="text" name="txthobi" value="<?= $hobi ?>">
        </label>

        <label><span>Pasangan:</span>
          <input type="text" name="txtpasangan" value="<?= $pasangan ?>">
        </label>

        <label><span>Pekerjaan:</span>
          <input type="text" name="txtpekerjaan" value="<?= $pekerjaan ?>">
        </label>

        <label><span>Nama Orang Tua:</span>
          <input type="text" name="txtnamaorangtua" value="<?= $ortu ?>">
        </label>

        <label><span>Nama Kakak:</span>
          <input type="text" name="txtnamakakak" value="<?= $kakak ?>">
        </label>

        <label><span>Nama Adik:</span>
          <input type="text" name="txtnamaadik" value="<?= $adik ?>">
        </label>

        <label>
          <span>Berapa <?= $a ?> + <?= $b ?> ?</span>
          <input type="number" name="txtcaptcha">
        </label>

        <button type aherf="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>
  </main>

  <script src="script.js"></script>
</body>
</html>