<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
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
                        <?php if (session()->get('level') == 0) : ?>
                            <!-- Tombol Print hanya untuk admin (level 0) -->
                            <a href="<?= base_url('barang/print') ?>" class="btn btn-primary btn-sm pull-left" target="_blank" style="margin-bottom: 10px; margin-right: 5px;">
                                <i class="fa fa-print"></i> Print
                            </a>
                        <?php endif; ?>
                        <button type="button" class="btn btn-primary btn-sm pull-left" data-toggle="modal" data-target="#add" style="margin-bottom: 10px; margin-right: 5px;">
                            <i class="fa fa-plus"></i> Add
                        </button>
                    </div>
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                    </div>
                <?php endif; ?>
                <table id="example1" class="table table-bordered table-striped">
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
                            <th>Action</th>
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
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $item['id_barang'] ?>"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $item['id_barang'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Item</h4>
            </div>
            <div class="modal-body">
                <?= form_open('barang/add') ?>
                <div class="row">
                    <!-- Kolom 1 -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="nama_kategori" class="form-control" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="Peralatan Elektronik">Peralatan Elektronik</option>
                                <option value="Perabotan">Perabotan</option>
                                <option value="Perlengkapan Kantor">Perlengkapan Kantor</option>
                                <option value="Peralatan Kebersihan">Peralatan Kebersihan</option>
                                <option value="Peralatan Keamanan">Peralatan Keamanan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Merk</label>
                            <input name="merk" class="form-control" placeholder="Merk" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pembelian</label>
                            <input type="date" name="tanggal_pembelian" class="form-control" required>
                        </div>
                    </div>
                    <!-- Kolom 2 -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Harga</label>
                            <input name="harga" type="number" class="form-control" placeholder="Harga" required>
                        </div>
                        <div class="form-group">
                            <label>Kondisi</label>
                            <select name="kondisi" class="form-control" required>
                                <option value="" disabled selected>Pilih kondisi</option>
                                <option value="Baik">Baik</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Berat">Rusak Berat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <select name="id_lokasi" class="form-control" required>
                                <?php foreach ($lokasi as $lok) : ?>
                                    <option value="<?= $lok['id_lokasi'] ?>"><?= $lok['nm_lokasi'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Spesifikasi</label>
                            <textarea name="spesifikasi" class="form-control" placeholder="Spesifikasi" rows="4" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>


<!-- Modal Edit -->
<?php foreach ($barang as $item) : ?>
    <div class="modal fade" id="edit<?= $item['id_barang'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Item</h4>
                </div>
                <div class="modal-body">
                    <?= form_open('barang/edit/' . $item['id_barang']) ?>
                    <div class="row">
                        <!-- Kolom 1 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input name="nama_barang" value="<?= $item['nama_barang'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="nama_kategori" class="form-control" required>
                                    <option value="Peralatan Elektronik" <?= ($item['nama_kategori'] == 'Peralatan Elektronik') ? 'selected' : '' ?>>Peralatan Elektronik</option>
                                    <option value="Perabotan" <?= ($item['nama_kategori'] == 'Perabotan') ? 'selected' : '' ?>>Perabotan</option>
                                    <option value="Perlengkapan Kantor" <?= ($item['nama_kategori'] == 'Perlengkapan Kantor') ? 'selected' : '' ?>>Perlengkapan Kantor</option>
                                    <option value="Peralatan Kebersihan" <?= ($item['nama_kategori'] == 'Peralatan Kebersihan') ? 'selected' : '' ?>>Peralatan Kebersihan</option>
                                    <option value="Peralatan Keamanan" <?= ($item['nama_kategori'] == 'Peralatan Keamanan') ? 'selected' : '' ?>>Peralatan Keamanan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <input name="merk" value="<?= $item['merk'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pembelian</label>
                                <input type="date" name="tanggal_pembelian" value="<?= $item['tanggal_pembelian'] ?>" class="form-control" required>
                            </div>
                        </div>
                        <!-- Kolom 2 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Harga</label>
                                <input name="harga" type="number" value="<?= $item['harga'] ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Kondisi</label>
                                <select name="kondisi" class="form-control" required>
                                    <option value="Baik" <?= ($item['kondisi'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                    <option value="Rusak Ringan" <?= ($item['kondisi'] == 'Rusak Ringan') ? 'selected' : '' ?>>Rusak Ringan</option>
                                    <option value="Rusak Berat" <?= ($item['kondisi'] == 'Rusak Berat') ? 'selected' : '' ?>>Rusak Berat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <select name="id_lokasi" class="form-control" required>
                                    <?php foreach ($lokasi as $lok) : ?>
                                        <option value="<?= $lok['id_lokasi'] ?>" <?= ($lok['id_lokasi'] == $item['id_lokasi']) ? 'selected' : '' ?>><?= $lok['nm_lokasi'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Spesifikasi</label>
                                <textarea name="spesifikasi" class="form-control" rows="4" required><?= $item['spesifikasi'] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Delete -->
<?php foreach ($barang as $item) : ?>
    <div class="modal fade" id="delete<?= $item['id_barang'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Item</h4>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <b><?= $item['nama_barang'] ?></b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('barang/delete/' . $item['id_barang']) ?>" class="btn btn-success">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>