<?php
session_start();
require_once __DIR__ . "/fungsi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya Dika";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <?php
    $flash_berhasil = $_SESSION["flash_berhasil"] ?? "";
    $flash_gagal = $_SESSION["flash_gagal"] ?? "";
    $outdated = $_SESSION["outdated"] ?? [];

    unset($_SESSION["flash_berhasil"], $_SESSION["flash_gagal"], $_SESSION["outdated"]);
    ?>
    <section id="biodata">
      <h2>Biodata Sederhana Mahasiswa</h2>

       <?php if (!empty($flash_berhasil)): ?>
        <div style="padding:10px; margin-bottom: 10px; background-color: #d4edda; color: #155724; border-radius: 6px;">
          <?= $flash_berhasil; ?>
        <?php endif; ?>

        <?php if (!empty($flash_gagal)): ?>
          <div style="padding:10px; margin-bottom: 10px; background-color: #f8d7da; color: #721c24; border-radius: 6px;">
            <?= $flash_gagal; ?>
          <?php endif; ?>

      <form action="biodata_proses.php" method="POST">

        <label for="txtnim"><span>NIM:</span>
          <input type="text" id="txtnim" name="txtnim" placeholder="Masukkan NIM" 
          value="<?= isset($outdated["nim"]) ? htmlspecialchars($outdated["nim"]) : '' ?>">
        </label>

        <label for="txtnamalengkap"><span>Nama Lengkap:</span>
          <input type="text" id="txtnamalengkap" name="txtnamalengkap" placeholder="Masukkan Nama Lengkap" 
          value="<?= isset($outdated["namalengkap"]) ? htmlspecialchars($outdated["namalengkap"]) : '' ?>">
        </label>

        <label for="txttempatlahir"><span>Tempat Lahir:</span>
          <input type="text" id="txttempatlahir" name="txttempatlahir" placeholder="Masukkan Tempat Lahir" 
          value="<?= isset($outdated["tempatlahir"]) ? htmlspecialchars($outdated["tempatlahir"]) : '' ?>">
        </label>

        <label for="txttanggallahir"><span>Tanggal Lahir:</span>
          <input type="text" id="txttanggallahir" name="txttanggallahir" placeholder="Masukkan Tanggal Lahir" 
          value="<?= isset($outdated["tanggallahir"]) ? htmlspecialchars($outdated["tanggallahirr"]) : '' ?>">
        </label>

        <label for="txthobi"><span>Hobi:</span>
          <input type="text" id="txthobi" name="txthobi" placeholder="Masukkan Hobi" 
          value="<?= isset($outdated["hobi"]) ? htmlspecialchars($outdated["hobi"]) : '' ?>">
        </label>

        <label for="txtpasangan"><span>Pasangan:</span>
          <input type="text" id="txtpasangan" name="txtpasangan" placeholder="Masukkan Pasangan" 
          value="<?= isset($outdated["pasangan"]) ? htmlspecialchars($outdated["pasangan"]) : '' ?>">
        </label>

        <label for="txtpekerjaan"><span>Pekerjaan:</span>
          <input type="text" id="txtpekerjaan" name="txtpekerjaan" placeholder="Masukkan Pekerjaan" 
          value="<?= isset($outdated["pekerjaan"]) ? htmlspecialchars($outdated["pekerjaan"]) : '' ?>">
        </label>

        <label for="txtnamaortu"><span>Nama Orang Tua:</span>
          <input type="text" id="txtnamaortu" name="txtnamaortu" placeholder="Masukkan Nama Orang Tua" 
          value="<?= isset($outdated["namaortu"]) ? htmlspecialchars($outdated["namaortu"]) : '' ?>">
        </label>

        <label for="txtnamakakak"><span>Nama Kakak:</span>
          <input type="text" id="txtnamakakak" name="txtnamakakak" placeholder="Masukkan Nama Kakak" 
          value="<?= isset($outdated["namakakak"]) ? htmlspecialchars($outdated["namakakak"]) : '' ?>">
        </label>

        <label for="txtnamaadikk"><span>Nama Adik:</span>
          <input type="text" id="txtnamaadik" name="txtnamaadik" placeholder="Masukkan Nama Adik" 
          value="<?= isset($outdated["namaadik"]) ? htmlspecialchars($outdated["namaadik"]) : '' ?>">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

    </section>

    <section id="about">
      <h2>Tentang Saya</h2>
      <?php include 'biodata_inc.php'; ?>
    </section>

    <?php
    $flash_sukses = $_SESSION["flash_sukses"] ?? "";
    $flash_error = $_SESSION["flash_error"] ?? "";
    $old = $_SESSION["old"] ?? [];

    unset($_SESSION["flash_sukses"], $_SESSION["flash_error"], $_SESSION["old"]);
    ?>

    <?php
    $a = rand(1, 9);
    $b = rand(1, 9);
    $_SESSION["jawaban"] = $a + $b;
    ?>


    <section id="contact">
      <h2>Kontak Kami</h2>

      <?php if (!empty($flash_sukses)): ?>
        <div style="padding:10px; margin-bottom: 10px; background-color: #d4edda; color: #155724; border-radius: 6px;">
          <?= $flash_sukses; ?>
        <?php endif; ?>

        <?php if (!empty($flash_error)): ?>
          <div style="padding:10px; margin-bottom: 10px; background-color: #f8d7da; color: #721c24; border-radius: 6px;">
            <?= $flash_error; ?>
          <?php endif; ?>

          <form action="proses.php" method="POST">

            <label for="txtNama"><span>Nama:</span>
              <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" autocomplete="name"
                value="<?= isset($old["nama"]) ? htmlspecialchars($old["nama"]) : '' ?>">
            </label>

            <label for="txtEmail"><span>Email:</span>
              <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" autocomplete="email"
                value="<?= isset($old["email"]) ? htmlspecialchars($old["email"]) : '' ?>">
            </label>

            <label for="txtPesan"><span>Pesan Anda:</span>
              <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..."
                value="<?= isset($old["pesan"]) ? htmlspecialchars($old["pesan"]) : '' ?>"></textarea>
              <small id="charCount">0/200 karakter</small>
            </label>
            <label for="txtbot_verification">
              <span>Berapa <?= $a ?> + <?= $b ?> ?</span>
              <input type="number" id="txtbot_verification" name="txtbot_verification" placeholder="Jawaban" >
            </label>

            <button type="submit">Kirim</button>
            <button type="reset">Batal</button>
          </form>

    </section>
    <section id="read">
      <h2>Yang Menghubungi Kami</h2>
      <?php include 'read_inc.php'; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>