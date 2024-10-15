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
                            <th>Nama Lokasi</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($lokasi as $key => $value) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nm_lokasi'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_lokasi'] ?>"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_lokasi'] ?>"><i class="fa fa-trash"></i></button>
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
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Lokasi</h4>
            </div>
            <div class="modal-body">
                <?= form_open('lokasi/add'); ?>
                <div class="form-group">
                    <label>Nama Lokasi</label>
                    <input name="nm_lokasi" class="form-control" placeholder="Nama Lokasi" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach ($lokasi as $key => $value) : ?>
    <div class="modal fade" id="edit<?= $value['id_lokasi'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Lokasi</h4>
                </div>
                <div class="modal-body">
                    <?= form_open('lokasi/edit/' . $value['id_lokasi']); ?>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input name="nm_lokasi" value="<?= $value['nm_lokasi'] ?>" class="form-control" placeholder="Lokasi" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Modal Delete -->
<?php foreach ($lokasi as $key => $value) : ?>
    <div class="modal fade" id="delete<?= $value['id_lokasi'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Lokasi</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus <b><?= $value['nm_lokasi'] ?></b>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('lokasi/delete/' . $value['id_lokasi']) ?>" class="btn btn-success btn-flat">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>