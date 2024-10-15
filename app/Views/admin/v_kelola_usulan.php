<section class="content-header">
    <h1><?= $title ?></h1>
    <br>
</section>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-default box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?></h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="<?= base_url('kelolausulan/print') ?>" class="btn btn-primary btn-sm pull-left" target="_blank" style="margin-bottom: 10px; margin-right: 5px;">
                            <i class="fa fa-print"></i> Print
                        </a>
                    </div>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Perkiraan Harga</th>
                            <th>Jumlah Harga</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th width="150px" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $jms = array();
                        $no = 1;
                        foreach ($usulan as $usul):
                            array_push($jms, $usul['jmlHarga']);
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $usul['namaBarang'] ?></td>
                                <td><?= $usul['jmlBarang'] ?></td>
                                <td><?= number_format($usul['kiraHarga'], 0, ',', '.') ?></td>
                                <td><?= number_format($usul['jmlHarga'], 0, ',', '.') ?></td>
                                <td><?= $usul['keperluan'] ?></td>
                                <td class="text-center">
                                    <?= $usul['status'] == '1' ? '<span class="fa fa-hourglass-start"></span>' : ($usul['status'] == '2' ? '<span class="fa fa-check-circle"></span>' : '<span class="fa fa-times-circle"></span>'); ?>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-success btn-sm btn-flat" data-toggle="modal" data-target="#approve<?= $usul['id_'] ?>"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#reject<?= $usul['id_'] ?>"><i class="fa fa-close"></i></button>
                                    <button class="btn btn-badge btn-sm btn-flat" data-toggle="modal" data-target="#refresh<?= $usul['id_'] ?>"><i class="fa fa-undo"></i></button>
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $usul['id_'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <?php if ($jms): ?>
                            <tr>
                                <th style="text-align: left;" colspan="3">Keseluruhan: <span>Rp.</span> <?php echo number_format(array_sum($jms), 0, ',', '.') ?></th>
                                <th style="text-align: left;" colspan="2">Disetujui: <span>Rp.</span> <?php echo number_format($jmlAprove, 0, ',', '.') ?></th>
                                <th style="text-align: left;" colspan="3">Ditolak: <span>Rp.</span> <?php echo number_format($jmlReject, 0, ',', '.') ?></th>
                            </tr>
                        <?php endif ?>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<?php foreach ($usulan as $key => $value) : ?>
    <div class="modal fade" id="delete<?= $value['id_'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Usulan Barang</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus usulan barang <b><?= $value['namaBarang'] ?></b>?
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('usulanbarang/delete/' . $value['id_']) ?>" class="btn btn-danger">Hapus</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Approve -->
<?php foreach ($usulan as $key => $value) : ?>
    <div class="modal fade" id="approve<?= $value['id_'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Setujui Usulan Barang</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menyetujui usulan barang <b><?= $value['namaBarang'] ?></b>?
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('kelolausulan/approve/' . $value['id_']) ?>" class="btn btn-success">Setujui</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Reject -->
<?php foreach ($usulan as $key => $value) : ?>
    <div class="modal fade" id="reject<?= $value['id_'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tolak Usulan Barang</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menolak usulan barang <b><?= $value['namaBarang'] ?></b>?
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('kelolausulan/reject/' . $value['id_']) ?>" class="btn btn-danger">Tolak</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Refresh -->
<?php foreach ($usulan as $key => $value) : ?>
    <div class="modal fade" id="refresh<?= $value['id_'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Reset Status Usulan Barang</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin mengembalikan status usulan barang <b><?= $value['namaBarang'] ?></b> ke status menunggu?
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('kelolausulan/refresh/' . $value['id_']) ?>" class="btn btn-primary">Reset</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- Script untuk menghitung Jumlah Harga -->
<script>
    function updateJumlahHarga() {
        var jmlBarang = document.getElementById('jmlBarang').value;
        var kiraHarga = document.getElementById('kiraHarga').value;
        var jmlHarga = jmlBarang * kiraHarga;
        document.getElementById('jmlHarga').value = jmlHarga;
    }

    function updateJumlahHargaEdit() {
        var jmlBarang = document.getElementById('jmlBarangEdit').value;
        var kiraHarga = document.getElementById('kiraHargaEdit').value;
        var jmlHarga = jmlBarang * kiraHarga;
        document.getElementById('jmlHargaEdit').value = jmlHarga;
    }
</script>