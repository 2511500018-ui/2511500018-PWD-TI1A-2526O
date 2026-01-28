<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$sql = "SELECT * FROM tbl_biodata_mahasiswa ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
?>

<?php
$flash_berhasil = $_SESSION['flash_berhasil'] ?? '';
$flash_gagal = $_SESSION['flash_gagal'] ?? '';

unset($_SESSION['flash_berhasil'], $_SESSION['flash_gagal']);
?>

<?php if (!empty($flash_berhasil)): ?>

    <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
        <?= $flash_berhasil; ?>
    </div>
<?php endif; ?>
<?php if (!empty($flash_gagal)): ?>
    <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
        <?= $flash_gagal; ?>
    </div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>NO</th>
        <th>Action</th>
        <th>ID</th>
        <th>NID</th>
        <th>Nama Lengkap</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Hobi</th>
        <th>Pasangan</th>
        <th>Pekerjaan</th>
        <th>Nama Orang Tua</th>
        <th>Nama Kakak</th>
        <th>Nama Adik</th>
        <th>Waktu</th>
    </tr>

    <?php
    $no = 1;
    while ($row = mysqli_fetch_assoc($q)): ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><a href="edit_biodata_dosen.php?cid=<?= (int)$row['cid']; ?>">Edit</a>
                <a onclick="return confirm('Apakah Anda Benar Ingin Menghapus <?= htmlspecialchars($row['cnamalengkap']); ?>?')" href="biodata_delete_dosen.php?cid=<?= (int)$row['cid']; ?>">Delete</a>
            </td>
            <td><?= $row['cid']; ?></td>
            <td><?= htmlspecialchars($row['cnim']); ?></td>
            <td><?= htmlspecialchars($row['cnamalengkap']); ?></td>
            <td><?= htmlspecialchars($row['ctempatlahir']); ?></td>
            <td><?= htmlspecialchars($row['ctanggallahir']); ?></td>
            <td><?= htmlspecialchars($row['chobi']); ?></td>
            <td><?= htmlspecialchars($row['cpasangan']); ?></td>
            <td><?= htmlspecialchars($row['cpekerjaan']); ?></td>
            <td><?= htmlspecialchars($row['cnamaortu']); ?></td>
            <td><?= htmlspecialchars($row['cnamakakak']); ?></td>
            <td><?= htmlspecialchars($row['cnamaadik']); ?></td>
            <td><?= htmlspecialchars($row['dcreated_at']); ?></td>
        </tr>

    <?php endwhile; ?>
</table>

<?php
if (!$q) {
    die("Query error: " . mysqli_error($conn));
}
?>