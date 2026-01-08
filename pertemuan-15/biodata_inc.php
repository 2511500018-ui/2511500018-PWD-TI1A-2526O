<?php
require 'koneksi.php';
require_once 'fungsi.php';

$fieldConfig = [
    "nim" => ["label" => "NIM:", "suffix" => ""],
    "namalengkap" => ["label" => "Nama Lengkap:", "suffix" => " &#128526;"],
    "tempatlahir" => ["label" => "Tempat Lahir:", "suffix" => ""],
    "tanggallahir" => ["label" => "Tanggal Lahir:", "suffix" => ""],
    "hobi" => ["label" => "Hobi:", "suffix" => ""],
    "pasangan" => ["label" => "Pasangan:", "suffix" => " &hearts;"],
    "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => " &copy; 2025"],
    "namaortu" => ["label" => "Nama Orang Tua:", "suffix" => ""],
    "namakakak" => ["label" => "Nama Kakak:", "suffix" => ""],
    "namaadik" => ["label" => "Nama Adik:", "suffix" => ""]
];

$sql = "SELECT * FROM tbl_biodata_mahasiswa ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);

if (!$q) {
    echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada data tamu yang tersimpan.</p>";
} else {
    while ($row = mysqli_fetch_assoc($q)) {
        $arrBiodata = [
            "nim" => $row['cnim'] ?? "",
            "namalengkap" => $row["cnamalengkap"] ?? "",
            "tempatlahir" => $row["ctempatlahir"] ?? "",
            "tanggallahir" => $row["ctanggallahir"] ?? "",
            "hobi" => $row["chobi"] ?? "",
            "pasangan" => $row["cpasangan"] ?? "",
            "pekerjaan" => $row["cpekerjaan"] ?? "",
            "namaortu" => $row["cnamaortu"] ?? "",
            "namakakak" => $row["cnamakakak"] ?? "",
            "namaadik" => $row["cnamaadik"] ?? "",
        ];
        echo tampilkanBiodata($fieldConfig, $arrBiodata);
    }
}
?>