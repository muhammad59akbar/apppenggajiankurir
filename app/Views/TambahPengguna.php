<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahpengguna">
    <i class="bi bi-person-add"></i> Tambah Pengguna
</button>


<div class="modal fade" id="tambahpengguna" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pengguna</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('private/admin/tambahuserpengguna') ?>" method="post">
                <div class="modal-body">
                    <div class="d-flex flex-column">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" id="email" aria-describedby="email" name="email" value="<?= old('email') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>" id="username" aria-describedby="username" name="username" value="<?= old('username') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.username') ?>
                        </div>
                    </div>

                    <div class="d-flex flex-column">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" id="password" aria-describedby="password" name="password">
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="confpass" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control <?= session('errors.confpass') ? 'is-invalid' : '' ?>" id="confpass" aria-describedby="confpass" name="confpass">
                        <div class="invalid-feedback">
                            <?= session('errors.confpass') ?>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <label for="namalengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control <?= session('errors.namalengkap') ? 'is-invalid' : '' ?>" id="namalengkap" aria-describedby="namalengkap" name="namalengkap" value="<?= old('namalengkap') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.namalengkap') ?>
                        </div>

                    </div>
                    <div class="d-flex flex-column">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control <?= session('errors.alamat') ? 'is-invalid' : '' ?>" id="alamat" aria-describedby="alamat" name="alamat" value="<?= old('alamat') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.alamat') ?>
                        </div>

                    </div>
                    <div class="d-flex flex-column">
                        <label for="notelp" class="form-label">No Telp</label>
                        <input type="text" class="form-control <?= session('errors.notelp') ? 'is-invalid' : '' ?>" id="notelp" aria-describedby="notelp" name="notelp" value="<?= old('notelp') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.notelp') ?>
                        </div>

                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Jabatan</label>
                        <select class="form-select" aria-label="Default select example" name="jabatanpengguna">
                            <option value="1">Admin</option>
                            <option value="2">Kapten</option>
                            <option value="3" selected>Kurir</option>
                        </select>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>