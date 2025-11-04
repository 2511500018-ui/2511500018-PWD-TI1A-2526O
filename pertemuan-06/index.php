<?php
$Nim = "2511500018 &#127380";
$Nama_Lengkap = "Dika Yansah &#128526";
$Tempat_Lahir  = "Pangkalpinang, &#128205";
$Tanggal_Lahir = " 13 Desember &#128197 2006";
$Hobi_Saya = "Mendengarkan musik &#127911,Bemain game &#127918";
$Pasangan  = "Belum laku &#128514";
$Saya_Berstatus = "Mahasiswa &#127891";
$Nama_Ayah = "Marwadi &#128104";
$Nama_Ibu = "Ngatinah &#128105";
$Nama_Kakak = "Indah Nuryanto &#128102";
$Nama_Adik = "Tidak ada &#128517";
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
        <li><a href="#about">Tentang Saya</a></li>
        <li><a href="#nilai">Nilai</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>

    
    <section id="home">
      <h2>Selamat Datang</h2>
      <p>Ini contoh paragraf HTML.</p>
    </section>

  
    <section id="about">
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong> <?= $Nim ?></p>
      <p><strong>Nama Lengkap:</strong> <?= $Nama_Lengkap ?></p>
      <p><strong>Tempat Lahir:</strong> <?= $Tempat_Lahir ?></p>
      <p><strong>Tanggal Lahir:</strong> <?= $Tanggal_Lahir ?></p>
      <p><strong>Hobi Saya:</strong> <?= $Hobi_Saya ?></p>
      <p><strong>Pasangan:</strong> <?= $Pasangan ?></p>
      <p><strong>Status:</strong> <?= $Saya_Berstatus ?></p>
      <p><strong>Nama Ayah:</strong> <?= $Nama_Ayah ?></p>
      <p><strong>Nama Ibu:</strong> <?= $Nama_Ibu ?></p>
      <p><strong>Nama Kakak:</strong> <?= $Nama_Kakak ?></p>
      <p><strong>Nama Adik:</strong> <?= $Nama_Adik ?></p>
    </section>

    
    <section id="nilai">
      <h2>Perhitungan Nilai Akhir, Grade, dan IPK</h2>

      <?php
      
      $namaMatkul1 = "Kalkulus";
      $namaMatkul2 = "Logika Informatika";
      $namaMatkul3 = "Pemgantar Teknik Informatika";
      $namaMatkul4 = "Aplikasi Perkantoran";
      $namaMatkul5 = "Konsep Basis Data";
      $namaMatkul6 = "Pemogramman Web";
      $namaMatkul7 = "Wawasan Berbudi Luhur";

      $sksMatkul1 = 3;
      $sksMatkul2 = 3;
      $sksMatkul3 = 3;
      $sksMatkul4 = 3;
      $sksMatkul5 = 3;
      $sksMatkul6 = 3;
      $sksMatkul7 = 2;

      $nilaiHadir1 = 85;     
      $nilaiHadir2 = 90;     
      $nilaiHadir3 = 90;     
      $nilaiHadir4 = 90;     
      $nilaiHadir5 = 85;
      $nilaiHadir6 = 100;
      $nilaiHadir7 = 90;
      
      $nilaiTugas1 = 85;
      $nilaiTugas2 = 90;
      $nilaiTugas3 = 80;
      $nilaiTugas4 = 85;
      $nilaiTugas5 = 80;
      $nilaiTugas6 = 95;
      $nilaiTugas7 = 90;

      $nilaiUTS1 = 80;
      $nilaiUTS2 = 85;
      $nilaiUTS3 = 80;
      $nilaiUTS4 = 85;
      $nilaiUTS5 = 80;
      $nilaiUTS6 = 95;
      $nilaiUTS7 = 90;

      $nilaiUAS1 = 82;
      $nilaiUAS2 = 84;
      $nilaiUAS3 = 86;
      $nilaiUAS4 = 88;
      $nilaiUAS5 = 80;
      $nilaiUAS6 = 95;
      $nilaiUAS7 = 90;

      // FUNGSI HITUNG NILAI
      function hitungNilai($hadir, $tugas, $uts, $uas, $sks) {
        $nilaiAkhir = (0.1 * $hadir) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas);

        if ($hadir < 70) {
          $grade = "E";
          $mutu = 0.0;
          $status = "Gagal";
        } else {
          if ($nilaiAkhir >= 91) { $grade = "A"; $mutu = 4.0; }
          elseif ($nilaiAkhir >= 86) { $grade = "A-"; $mutu = 3.7; }
          elseif ($nilaiAkhir >= 81) { $grade = "B+"; $mutu = 3.3; }
          elseif ($nilaiAkhir >= 76) { $grade = "B"; $mutu = 3.0; }
          elseif ($nilaiAkhir >= 71) { $grade = "B-"; $mutu = 2.7; }
          elseif ($nilaiAkhir >= 66) { $grade = "C+"; $mutu = 2.3; }
          elseif ($nilaiAkhir >= 61) { $grade = "C"; $mutu = 2.0; }
          elseif ($nilaiAkhir >= 56) { $grade = "C-"; $mutu = 1.7; }
          elseif ($nilaiAkhir >= 51) { $grade = "D"; $mutu = 1.0; }
          else { $grade = "E"; $mutu = 0.0; }
          $status = ($mutu > 0) ? "Lulus" : "Gagal";
        }

        $bobot = $sks * $mutu;
        return [$nilaiAkhir, $grade, $mutu, $bobot, $status];
      }

      // HITUNG SEMUA MATA KULIAH
      list($nilaiAkhir1, $grade1, $mutu1, $bobot1, $status1) = hitungNilai($nilaiHadir1, $nilaiTugas1, $nilaiUTS1, $nilaiUAS1, $sksMatkul1);
      list($nilaiAkhir2, $grade2, $mutu2, $bobot2, $status2) = hitungNilai($nilaiHadir2, $nilaiTugas2, $nilaiUTS2, $nilaiUAS2, $sksMatkul2);
      list($nilaiAkhir3, $grade3, $mutu3, $bobot3, $status3) = hitungNilai($nilaiHadir3, $nilaiTugas3, $nilaiUTS3, $nilaiUAS3, $sksMatkul3);
      list($nilaiAkhir4, $grade4, $mutu4, $bobot4, $status4) = hitungNilai($nilaiHadir4, $nilaiTugas4, $nilaiUTS4, $nilaiUAS4, $sksMatkul4);
      list($nilaiAkhir5, $grade5, $mutu5, $bobot5, $status5) = hitungNilai($nilaiHadir5, $nilaiTugas5, $nilaiUTS5, $nilaiUAS5, $sksMatkul5);
      list($nilaiAkhir6, $grade6, $mutu6, $bobot6, $status6) = hitungNilai($nilaiHadir6, $nilaiTugas6, $nilaiUTS6, $nilaiUAS6, $sksMatkul6);
      list($nilaiAkhir7, $grade7, $mutu7, $bobot7, $status7) = hitungNilai($nilaiHadir7, $nilaiTugas7, $nilaiUTS7, $nilaiUAS7, $sksMatkul7);

      // HITUNG TOTAL DAN IPK
      $totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5; + $bobot6; + $bobot7;
      $totalSKS = $sksMatkul1 + $sksMatkul2 + $sksMatkul3 + $sksMatkul4 + $sksMatkul5; + $sksMatkul6; + $sksMatkul7;
      $IPK = $totalBobot / $totalSKS;

      // TAMPILKAN NILAI
      for ($i = 1; $i <= 7; $i++) {
   for ($i = 1; $i <= 7; $i++) {
  echo "<div class='matkul'>";
  echo "<p><strong>Nama Mata Kuliah ke-$i:</strong> <span>" . ${"namaMatkul$i"} . "</span></p>";
  echo "<p><strong>SKS:</strong> <span>" . ${"sksMatkul$i"} . "</span></p>";
  echo "<p><strong>Kehadiran:</strong> <span>" . ${"nilaiHadir$i"} . "</span></p>";
  echo "<p><strong>Tugas:</strong> <span>" . ${"nilaiTugas$i"} . "</span></p>";
  echo "<p><strong>UTS:</strong> <span>" . ${"nilaiUTS$i"} . "</span></p>";
  echo "<p><strong>UAS:</strong> <span>" . ${"nilaiUAS$i"} . "</span></p>";
  echo "<p><strong>Nilai Akhir:</strong> <span>" . number_format(${"nilaiAkhir$i"}, 2) . "</span></p>";
  echo "<p><strong>Grade:</strong> <span>" . ${"grade$i"} . "</span></p>";
  echo "<p><strong>Angka Mutu:</strong> <span>" . ${"mutu$i"} . "</span></p>";
  echo "<p><strong>Bobot:</strong> <span>" . ${"bobot$i"} . "</span></p>";
  echo "<p><strong>Status:</strong> <span>" . ${"status$i"} . "</span></p>";
  echo "</div>";
}

      }

      echo "<div class='total'>";
      echo "<p><strong>Total SKS:</strong> $totalSKS</p>";
      echo "<p><strong>Total Bobot:</strong> $totalBobot</p>";
      echo "<p><strong>IPK:</strong> " . number_format($IPK, 2) . "</p>";
      echo "</div>";
      ?>
    </section>

<section id="contact">
      <h2>Kontak Kami</h2>
      <form id="formKontak">
        <label>
          <span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama">
        </label>

        <label>
          <span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email">
        </label>

        <label>
          <span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..."></textarea>
        </label>

        <small id="charCount">0/200 karakter</small>
        <div class="tombol">
          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
        </div>
      </form>
    </section> 

  <footer>
    <p>&copy; 2025 Dika Yansah [2511500018]</p>
  </footer>

  <script>
    function ubahTeks() {
      document.getElementById("pesan").innerText = "Teks berhasil diubah!";
    }

    document.getElementById("tombol").addEventListener("click", function() {
      alert("Tombol diklik!");
      console.log("Tombol berhasil diklik!");
    });
  </script>

</body>
</html>
 
<script src="script.js"></script>