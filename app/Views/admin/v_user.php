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
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>User</th>
                            <th>Role</th>
                            <th>Foto</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $role_names = [
                            0 => 'Admin',
                            1 => 'Direktur',
                            2 => 'Staff'
                        ];

                        $no = 1;
                        foreach ($users as $key => $value) {
                            if ($value['level'] != 0) { // Tambahkan kondisi ini
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value['nama_user'] ?></td>
                                    <td><?= isset($role_names[$value['level']]) ? $role_names[$value['level']] : 'Unknown' ?></td>
                                    <td><?= $value['foto'] ?></td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_user'] ?>"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_user'] ?>"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                        <?php
                            } // Tutup kondisi
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

<!-- modal add -->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add User</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('users/add'); ?>

                <div class="form-group">
                    <label>User</label>
                    <input name="nama_user" class="form-control" placeholder="nama" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="level" class="form-control" required>
                        <option value="" disabled selected>Pilih Role</option>
                        <option value="1">Direktur</option>
                        <option value="2">Staff</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input name="foto" class="form-control" placeholder="Foto" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal edit -->
<?php foreach ($users as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_user'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open('users/edit/' . $value['id_user']); ?>

                    <div class="form-group">
                        <label>Nama User</label>
                        <input name="nama_user" value="<?= $value['nama_user'] ?>" class="form-control" placeholder="Nama User" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input name="username" value="<?= $value['username'] ?>" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" value="<?= $value['password'] ?>" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="level" class="form-control" required>
                            <option value="1" <?= ($value['level'] == 1) ? 'selected' : '' ?>>Direktur</option>
                            <option value="2" <?= ($value['level'] == 2) ? 'selected' : '' ?>>Staff</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input name="foto" value="<?= $value['foto'] ?>" class="form-control" placeholder="Foto" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>

<!-- modal delete -->
<?php foreach ($users as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete User</h4>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus data user <b><?= $value['nama_user'] ?>?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('users/delete/' . $value['id_user']) ?>" class="btn btn-success btn-flat">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>