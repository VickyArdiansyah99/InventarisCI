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
                        <button type="button" class="btn btn-primary btn-sm pull-left" data-toggle="modal" data-target="#add" style="margin-bottom: 10px;">
                            <i class="fa fa-plus"></i> Add
                        </button>
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
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $usul['namaBarang'] ?></td>
                                <td><?php echo $usul['jmlBarang'] ?></td>
                                <td><?php echo number_format($usul['kiraHarga'], 0, ',', '.') ?></td>
                                <td><?php echo number_format($usul['jmlHarga'], 0, ',', '.') ?></td>
                                <td><?php echo $usul['keperluan'] ?></td>
                                <td style="text-align: center;">
                                    <?php if ($usul['status'] == '1') {
                                        echo '<span class="fa fa-hourglass-start"></span>';
                                    } elseif ($usul['status'] == '2') {
                                        echo '<span class="fa fa-check-circle"></span>';
                                    } elseif ($usul['status'] == '0') {
                                        echo '<span class="fa fa-times-circle"></span>';
                                    } ?>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $usul['id_'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <?php if ($jms): ?>
                            <th style="text-align: right" colspan="6">Perkiraan Jumlah Keseluruhan</th>
                            <th nowrap="" colspan="2"><span>Rp.</span> <?php echo number_format(array_sum($jms), 0, ',', '.') ?></th>
                        <?php endif ?>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Usulan Barang</h4>
            </div>
            <div class="modal-body">
                <?= form_open('usulanbarang/add'); ?>
                <input type="hidden" name="id_pengusul" value="<?= session()->get('user_id'); ?>">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input name="namaBarang" id="namaBarang" class="form-control" placeholder="Nama Barang" required>
                </div>
                <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input name="jmlBarang" id="jmlBarang" class="form-control" placeholder="Jumlah Barang" required oninput="updateJumlahHarga()">
                </div>
                <div class="form-group">
                    <label>Perkiraan Harga</label>
                    <input name="kiraHarga" id="kiraHarga" class="form-control" placeholder="Perkiraan Harga" required oninput="updateJumlahHarga()">
                </div>
                <div class="form-group">
                    <label>Jumlah Harga</label>
                    <input name="jmlHarga" id="jmlHarga" class="form-control" placeholder="Jumlah Harga" readonly>
                </div>
                <div class="form-group">
                    <label>Keperluan</label>
                    <textarea name="keperluan" class="form-control" placeholder="Keperluan" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <?= form_close(); ?>
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