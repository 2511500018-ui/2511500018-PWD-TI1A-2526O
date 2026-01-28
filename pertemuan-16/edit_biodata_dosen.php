<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
  'options' => ['min_range' => 1]
]);

if (!$cid) {
  $_SESSION['flash_gagal'] = 'Akses tidak valid.';
  redirect_ke('biodata_dosen.php');
}

$stmt = mysqli_prepare($conn, "SELECT cid, cnim, cnamalengkap, ctempatlahir, ctanggallahir, chobi, cpasangan, cpekerjaan, cnamaortu, cnamakakak, cnamaadik
FROM tbl_biodata_mahasiswa WHERE cid = ? LIMIT 1");
if (!$stmt) {
  $_SESSION['flash_gagal'] = 'Query tidak benar.';
  redirect_ke('biodata_dosen.php');
}

mysqli_stmt_bind_param($stmt, "i", $cid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
  $_SESSION['flash_gagal'] = 'Record tidak ditemukan.';
  redirect_ke('biodata_dosen.php');
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