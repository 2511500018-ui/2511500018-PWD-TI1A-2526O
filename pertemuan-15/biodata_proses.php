<?php
session_start();

function redirect_ke($url)
{
    header("Location: " . $url);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    $_SESSION["flash_gagal"] = "Akses tidak valid.";
    redirect_ke("biodata.php#biodata");
}

require_once 'fungsi.php';

/* ambil cid */


/* ambil data form */
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

/* ambil captcha */

/* ================= VALIDASI ================= */


$error = [];

if ($nim === "") {
    $error[] = "NIM wajib diisi.";
} elseif (mb_strlen($nim) > 10) {
    $error[] = "NIM maksimal 10 karakter.";
}

if ($namalengkap === "") {
    $error[] = "Nama wajib diisi.";
} elseif (mb_strlen($namalengkap) < 2) {
    $error[] = "Nama minimal 2 karakter.";
}

if ($tempatlahir === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($tanggalahir === "") {
    $error[] = "Tidak boleh kosong mohon diisi";
}

if ($hobi === "") {
    $error[] = "Tidak boleh kosong mohon diisi";

}

if ($pasangan === "") {
    $error[] = "Tidak boleh kosong mohon diisi";

}

if ($pekerjaan === "") {
    $error[] = "Tidak boleh kosong mohon diisi";

}


if ($namaortu === "") {
    $error[] = "Tidak boleh kosong mohon diisi";

}

if ($namakakak === "") {
    $error[] = "Tidak boleh kosong mohon diisi";

}

if ($namaadik === "") {
    $error[] = "Tidak boleh kosong mohon diisi";

}

require 'koneksi.php';
if (!empty($error)) {
    $_SESSION["outdated"] = [
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

$sql = "INSERT INTO `tbl_biodata_mahasiswa` (cnim, cnamalengkap, ctempatlahir, ctanggallahir, chobi, cpasangan, cpekerjaan, cnamaortu, cnamakakak, cnamaadik) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
    unset($_SESSION["outdated"]);
    $_SESSION["flash_berhasil"] = "Terima kasih, pesan Anda telah tersimpan.";
    redirect_ke("index.php#biodata");
} else {
    $_SESSION["outdated"] =
        [
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
    $_SESSION["flash_gagal"] = "Gagal menyimpan pesan silakan coba lagi.";
    redirect_ke("index.php#biodata");
}
mysqli_stmt_close($stmt);



?>