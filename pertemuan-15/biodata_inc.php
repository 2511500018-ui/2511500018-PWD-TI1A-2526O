<?php
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

/* ================= KONFIGURASI FIELD ================= */
$fieldConfig = [
    "nim" => ["label" => "NIM:", "suffix" => ""],
    "namalengkap" => ["label" => "Nama Lengkap:", "suffix" => " 😎"],
    "tempatlahir" => ["label" => "Tempat Lahir:", "suffix" => ""],
    "tanggallahir" => ["label" => "Tanggal Lahir:", "suffix" => ""],
    "hobi" => ["label" => "Hobi:", "suffix" => ""],
    "pasangan" => ["label" => "Pasangan:", "suffix" => " ♥"],
    "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => " © 2025"],
    "namaortu" => ["label" => "Nama Orang Tua:", "suffix" => ""],
    "namakakak" => ["label" => "Nama Kakak:", "suffix" => ""],
    "namaadik" => ["label" => "Nama Adik:", "suffix" => ""]
];

/* ================= QUERY DATA ================= */
$sql = "SELECT * FROM tbl_biodata_mahasiswa ORDER BY cid DESC";
$q   = mysqli_query($conn, $sql);

if (!$q) {
    echo "<p>Gagal membaca data biodata.</p>";
    return;
}

if (mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada biodata mahasiswa yang tersimpan.</p>";
    return;
}

/* ================= TAMPILKAN DATA ================= */
while ($row = mysqli_fetch_assoc($q)) {

    $arrBiodata = [
        "nim"          => $row['cnim'] ?? "",
        "namalengkap"  => $row['cnamalengkap'] ?? "",
        "tempatlahir"  => $row['ctempatlahir'] ?? "",
        "tanggallahir" => formatTanggal($row['ctanggallahir'] ?? ""),
        "hobi"         => $row['chobi'] ?? "",
        "pasangan"     => $row['cpasangan'] ?? "",
        "pekerjaan"    => $row['cpekerjaan'] ?? "",
        "namaortu"     => $row['cnamaortu'] ?? "",
        "namakakak"    => $row['cnamakakak'] ?? "",
        "namaadik"     => $row['cnamaadik'] ?? "",
    ];

    echo tampilkanBiodata($fieldConfig, $arrBiodata);
}
