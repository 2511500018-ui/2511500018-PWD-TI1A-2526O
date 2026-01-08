<?php
session_start();

function redirect_ke($url)
{
    header("Location: " . $url);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $_SESSION["flash_gagal"] = "Akses tidak valid.";
    redirect_ke("biodata.php");
}

require_once 'fungsi.php';

/* ambil cid */
$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT);
if (!$cid) {
    $_SESSION["flash_gagal"] = "ID tidak valid.";
    redirect_ke("biodata.php");
}

/* ambil data form */
$nim           = bersih($_POST["txtnim"] ?? "");
$namalengkap   = bersih($_POST["txtnamalengkap"] ?? "");
$tempatlahir  = bersih($_POST["txttempatlahir"] ?? "");
$tanggallahir = bersih($_POST["txttanggallahir"] ?? "");
$hobi          = bersih($_POST["txthobi"] ?? "");
$pasangan      = bersih($_POST["txtpasangan"] ?? "");
$pekerjaan     = bersih($_POST["txtpekerjaan"] ?? "");
$namaortu      = bersih($_POST["txtnamaorangtua"] ?? "");
$namakakak     = bersih($_POST["txtnamakakak"] ?? "");
$namaadik      = bersih($_POST["txtnamaadik"] ?? "");
$captcha       = $_POST["txtcaptcha"] ?? "";

/* ================= CAPTCHA ================= */
if (!isset($_SESSION["Jawaban"]) || $captcha === "" || (int)$captcha !== (int)$_SESSION["Jawaban"]) {
    $_SESSION["flash_gagal"] = "Jawaban captcha salah.";
    redirect_ke("edit_biodata.php?cid=" . $cid);
}

/* ================= VALIDASI ================= */
$error = [];

if ($nim === "") $error[] = "NIM wajib diisi.";
if ($namalengkap === "") $error[] = "Nama wajib diisi.";
if ($namaortu === "") $error[] = "Nama orang tua wajib diisi.";

if (!empty($error)) {
    $_SESSION["flash_gagal"] = implode("<br>", $error);
    redirect_ke("edit_biodata.php?cid=" . $cid);
}

/* ================= UPDATE DATABASE ================= */
require 'koneksi.php';

$sql = "UPDATE tbl_biodata_mahasiswa SET
    cnim = ?, 
    cnamalengkap = ?, 
    ctempatlahir = ?, 
    ctanggallahir = ?, 
    chobi = ?, 
    cpasangan = ?, 
    cpekerjaan = ?, 
    cnamaortu = ?, 
    cnamakakak = ?, 
    cnamaadik = ?
    WHERE cid = ?";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION["flash_gagal"] = "Gagal prepare database.";
    redirect_ke("edit_biodata.php?cid=" . $cid);
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssssi",
    $nim,
    $namalengkap,
    $tempatlahir,
    $tanggallahir,
    $hobi,
    $pasangan,
    $pekerjaan,
    $namaortu,
    $namakakak,
    $namaadik,
    $cid
);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION["Jawaban"]);
    $_SESSION["flash_berhasil"] = "Data biodata berhasil diperbarui.";
} else {
    $_SESSION["flash_gagal"] = "Gagal memperbarui data.";
}

mysqli_stmt_close($stmt);

redirect_ke("biodata.php");