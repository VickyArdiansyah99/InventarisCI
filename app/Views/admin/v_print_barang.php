<?= $this->extend('layout/v_print') ?> <!-- Menggunakan template v_print.php -->

<?= $this->section('content') ?> <!-- Mulai section untuk konten -->
<!-- Judul dan Tabel Data -->
<h3 style="text-align:center;">Data Kondisi <?= $title ?></h3>
<table border="1" width="100%" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Merk</th>
            <th>Spesifikasi</th>
            <th>Tanggal Pembelian</th>
            <th>Harga</th>
            <th>Kondisi</th>
            <th>Lokasi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($barang as $item) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $item['nama_barang'] ?></td>
                <td><?= $item['nama_kategori'] ?></td>
                <td><?= $item['merk'] ?></td>
                <td><?= $item['spesifikasi'] ?></td>
                <td><?= $item['tanggal_pembelian'] ?></td>
                <td><?= $item['harga'] ?></td>
                <td><?= $item['kondisi'] ?></td>
                <td><?= $item['nm_lokasi'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?> <!-- Akhiri section untuk konten -->