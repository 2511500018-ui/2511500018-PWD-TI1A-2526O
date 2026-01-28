<?php
session_start();

require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('index.php#contact');
}

$nama    = bersih($_POST['txtNama'] ?? '');
$email   = bersih($_POST['txtEmail'] ?? '');
$pesan   = bersih($_POST['txtPesan'] ?? '');
$captcha = bersih($_POST['txtbot_verification'] ?? '');

$errors = [];

if ($nama === '' || strlen($nama) < 3) {
    $errors[] = 'Nama minimal 3 karakter.';
}

if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email tidak valid.';
}

if ($pesan === '' || strlen($pesan) < 10) {
    $errors[] = 'Pesan minimal 10 karakter.';
}

if ($captcha == '' || $captcha != ($_SESSION['jawaban'] ?? null)) {
    $errors[] = 'Jawaban captcha salah.';
}

if (!empty($errors)) {
    $_SESSION['old'] = compact('nama', 'email', 'pesan');
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('index.php#contact');
}

$sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Kesalahan sistem.';
    redirect_ke('index.php#contact');
}

mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

unset($_SESSION['old']);
$_SESSION['flash_sukses'] = 'Terima kasih, pesan Anda berhasil dikirim.';
redirect_ke('index.php#contact');
