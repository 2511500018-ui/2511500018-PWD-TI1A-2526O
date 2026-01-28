<?php
session_start();

require_once __DIR__ . '/fungsi.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $_SESSION["flash_gagal"] = "Akses tidak valid.";
    redirect_ke("index.php#biodata");
}

/* ================= AMBIL DATA FORM ================= */
$nim           = bersih($_POST["txtnim"] ?? "");
$namalengkap   = bersih($_POST["txtnamalengkap"] ?? "");
$tempatlahir  = bersih($_POST["txttempatlahir"] ?? "");
$tanggallahir = bersih($_POST["txttanggallahir"] ?? "");
$hobi          = bersih($_POST["txthobi"] ?? "");
$pasangan      = bersih($_POST["txtpasangan"] ?? "");
$pekerjaan     = bersih($_POST["txtpekerjaan"] ?? "");
$namaortu      = bersih($_POST["txtnamaortu"] ?? "");
$namakakak     = bersih($_POST["txtnamakakak"] ?? "");
$namaadik      = bersih($_POST["txtnamaadik"] ?? "");

/* ================= VALIDASI ================= */
$error = [];

if ($nid === "") {
    $error[] = "NID wajib diisi.";
} elseif (mb_strlen($nim) > 10) {
    $error[] = "NID maksimal 10 karakter.";
}

if ($namalengkap === "") {
    $error[] = "Nama wajib diisi.";
} elseif (mb_strlen($namalengkap) < 2) {
    $error[] = "Nama minimal 2 karakter.";
}

if ($tempatlahir === "") {
    $error[] = "Tempat lahir wajib diisi.";
}

if ($tanggallahir === "") {
    $error[] = "Tanggal lahir wajib diisi.";
}

if ($hobi === "") {
    $error[] = "Hobi wajib diisi.";
}

if ($pasangan === "") {
    $error[] = "Pasangan wajib diisi.";
}

if ($pekerjaan === "") {
    $error[] = "Pekerjaan wajib diisi.";
}

if ($namaortu === "") {
    $error[] = "Nama orang tua wajib diisi.";
}

if ($namakakak === "") {
    $error[] = "Nama kakak wajib diisi.";
}

if ($namaadik === "") {
    $error[] = "Nama adik wajib diisi.";
}

/* ================= JIKA ERROR ================= */
if (!empty($error)) {
    $_SESSION["old"] = [
        "nim" => $nim,
        "namalengkap" => $namalengkap,
        "tempatlahir" => $tempatlahir,
        "tanggallahir" => $tanggallahir,
        "hobi" => $hobi,
        "pasangan" => $pasangan,
        "pekerjaan" => $pekerjaan,
        "namaortu" => $namaortu,
        "namakakak" => $namakakak,
        "namaadik" => $namaadik
    ];

    $_SESSION["flash_gagal"] = implode("<br>", $error);
    redirect_ke("index.php#biodata");
}

/* ================= SIMPAN KE DATABASE ================= */
require __DIR__ . '/koneksi.php';

$sql = "INSERT INTO tbl_biodata_mahasiswa
        (cnim, cnamalengkap, ctempatlahir, ctanggallahir, chobi, cpasangan, cpekerjaan, cnamaortu, cnamakakak, cnamaadik)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION["flash_gagal"] = "Gagal menyiapkan query.";
    redirect_ke("index.php#biodata");
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssss",
    $nim,
    $namalengkap,
    $tempatlahir,
    $tanggallahir,
    $hobi,
    $pasangan,
    $pekerjaan,
    $namaortu,
    $namakakak,
    $namaadik
);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION["old"]);
    $_SESSION["flash_berhasil"] = "Biodata berhasil disimpan.";
} else {
    $_SESSION["flash_gagal"] = "Biodata gagal disimpan.";
}

mysqli_stmt_close($stmt);
redirect_ke("index.php#biodata");
