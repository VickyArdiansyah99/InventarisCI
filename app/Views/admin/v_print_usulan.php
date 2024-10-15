<?= $this->extend('layout/v_print') ?>

<?= $this->section('content') ?>

<h3 style="text-align:center;">Data Usulan <?= $title ?></h3>
<table border="1" width="100%" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Perkiraan Harga</th>
            <th>Jumlah Harga</th>
            <th>Keperluan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($usulan as $item) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $item['namaBarang'] ?></td>
                <td><?= $item['jmlBarang'] ?></td>
                <td><?= number_format($item['kiraHarga'], 0, ',', '.') ?></td>
                <td><?= number_format($item['jmlHarga'], 0, ',', '.') ?></td>
                <td><?= $item['keperluan'] ?></td>
                <td>
                    <?= $item['status'] == '1' ? 'Pending' : ($item['status'] == '2' ? 'Approved' : 'Rejected') ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <?php if ($jms): ?>
            <tr>
                <th colspan="3" style="text-align: left;">Keseluruhan: Rp. <?= number_format(array_sum($jms), 0, ',', '.') ?></th>
                <th colspan="2" style="text-align: left;">Disetujui: Rp. <?= number_format($jmlAprove, 0, ',', '.') ?></th>
                <th colspan="3" style="text-align: left;">Ditolak: Rp. <?= number_format($jmlReject, 0, ',', '.') ?></th>
            </tr>
        <?php endif; ?>
    </tfoot>
</table>

<?= $this->endSection() ?>