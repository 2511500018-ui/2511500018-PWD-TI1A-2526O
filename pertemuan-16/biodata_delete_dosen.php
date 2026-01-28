<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$cid) {
    $_SESSION['flash_gagal'] = 'cid Tidak Valid.';
    header("Location: biodata_dosen.php");
    exit;
}

$stmt = mysqli_prepare(
    $conn,
    "DELETE FROM biodata_dosen WHERE cid = ?"
);

if (!$stmt) {
    $_SESSION['flash_gagal'] = 'Terjadi kesalahan sistem (prepare gagal).';
    header("Location: biodata_dosen.php");
    exit;
}

mysqli_stmt_bind_param($stmt, "i", $cid);

if (mysqli_stmt_execute($stmt)) {
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        $_SESSION['flash_berhasil'] = 'Terima kasih, data Anda sudah dihapus.';
    } else {
        $_SESSION['flash_gagal'] = 'Data tidak ditemukan.';
    }
} else {
    $_SESSION['flash_gagal'] = 'Data gagal dihapus.';
}

mysqli_stmt_close($stmt);
header("Location: biodata_dosen.php");
exit;