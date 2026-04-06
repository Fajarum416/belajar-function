<!-- INI ADALAH VIEW (PIRING) -->
<!-- Tugasnya: Hanya menampilkan tampilan dan styling. -->

<h3>Daftar Data Siswa (Tampilan MVC)</h3>

<table border="1" cellpadding="5" cellspacing="0" style="width: 100%; text-align: left;">
    <tr style="background-color: #eee;">
        <th>ID</th>
        <th>Nama</th>
        <th>Nilai 1</th>
        <th>Nilai 2</th>
        <th>Rata-rata</th>
        <th>Status</th>
    </tr>

    <?php if (empty($dataSiswa)): ?>
        <tr><td colspan="6">Belum ada data di database.</td></tr>
    <?php else: ?>
        <?php foreach ($dataSiswa as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['nilai1']; ?></td>
                <td><?php echo $row['nilai2']; ?></td>
                <td><?php echo $row['rata_rata']; ?></td>
                <td><b><?php echo $row['status']; ?></b></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
