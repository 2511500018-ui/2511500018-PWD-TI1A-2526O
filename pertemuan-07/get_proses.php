<?php
session_start();

if (isset($_GET["txtNama"]) && isset($_GET["txtEmail"]) && isset($_GET["txtPesan"])) {

    $_SESSION["nama"]  = $_GET["txtNama"];
    $_SESSION["email"] = $_GET["txtEmail"];
    $_SESSION["pesan"] = $_GET["txtPesan"];

    echo "<h2>Data berhasil diterima!</h2>";
    echo "Nama: " . $_SESSION["nama"] . "<br>";
    echo "Email: " . $_SESSION["email"] . "<br>";
    echo "Pesan: " . $_SESSION["pesan"] . "<br>";

    echo '<br><a href="get.php">Kembali ke form</a>';
} else {
    echo "<h3>Isi dulu formnya kakak.</h3>";
}
?>