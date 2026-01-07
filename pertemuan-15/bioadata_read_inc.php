<?php
require 'koneksi.php';

$fieldContact = [
  "nama" => ["label" => "Nama:", "suffix" => ""],
  "email" => ["label" => "Email:", "suffix" => ""],
  "pesan" => ["label" => "Pesan Anda:", "suffix" => ""]
];

$sql = "SELECT * FROM biodata_sederhana_mahasiswa ORDER BY id DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
  echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
  echo "<p>Belum ada data tamu yang tersimpan.</p>";
} else {
  while ($row = mysqli_fetch_assoc($q)) {
    $arrContact = [
      "nim"  => $row["nim"]  ?? "",
      "nama" => $row["nama lengkap"] ?? "",
      "tempat_lahir" => $row["tempat_lahir"] ?? "",
      "tanggal_lahir" => $row["tanggal_lahir"] ?? "",
      "hobi" => $row["tempat_lahir"] ?? "",
      "tempat_lahir" => $row["hobi"] ?? "",
      "pasangan" => $row["pasangan"] ?? "",
      "pekerjaan" => $row["pekerjaan"] ?? "",
      "nama_orang_tua" => $row["nama_orang_tua"] ?? "",
      "nama_kakak" => $row["nama_kakak"] ?? "",
      "nama_adik" => $row["nama_adik"] ?? "",
    ];
    echo tampilkanBiodata($fieldContact, $arrContact);
  }
}
?>