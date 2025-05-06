<?= $this->extend('Layouts/Templates'); ?>
<?= $this->section('content'); ?>

<h1 class="text-capitalize">Detail <?= $detailuser['namalengkap'] ?></h1>
<hr>
<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success m-2" role="alert">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>
<a href="<?= base_url('/private/admin/DataPengguna') ?>" class="m-2">&laquo; Kembali</a>

<form action="<?= base_url('private/admin/UpdatePengguna/' . $detailuser['id']) ?>" method="post">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $detailuser['id'] ?>">


    <div class="container mt-3">
        <div class="d-flex flex-column flex-lg-row mb-3">
            <div class="col-lg-5">

                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>" id="email" aria-describedby="email" name="email" required value="<?= $detailuser['email'] ?>">
                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>
            </div>
            <div class="col-lg-5 mx-0 mx-lg-5">

                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control <?= session('errors.username') ? 'is-invalid' : '' ?>" id="username" aria-describedby="username" name="username" value="<?= $detailuser['username'] ?>">
                <div class="invalid-feedback">
                    <?= session('errors.username') ?>
                </div>
            </div>
        </div>

        <div class="col-lg-5 mb-3">
            <label for="namalengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control <?= session('errors.namalengkap') ? 'is-invalid' : '' ?>" id="namalengkap" aria-describedby="namalengkap" name="namalengkap" value="<?= $detailuser['namalengkap'] ?>">
            <div class="invalid-feedback">
                <?= session('errors.namalengkap') ?>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row mb-3">
            <div class=" col-lg-5 mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control <?= session('errors.alamat') ? 'is-invalid' : '' ?>" id="alamat" aria-describedby="alamat" name="alamat" value="<?= $detailuser['alamat'] ?>">
                <div class="invalid-feedback">
                    <?= session('errors.alamat') ?>
                </div>
            </div>
            <div class=" col-lg-5 mx-0 mx-lg-5">
                <label for="notelp" class="form-label">No Telpon</label>
                <input type="text" class="form-control <?= session('errors.notelp') ? 'is-invalid' : '' ?>" id="notelp" aria-describedby="notelp" name="notelp" value="<?= $detailuser['notelp'] ?>">
                <div class="invalid-feedback">
                    <?= session('errors.notelp') ?>
                </div>
            </div>
        </div>
        <div class=" col-lg-5 mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" aria-describedby="password" name="password">
            <span class="text-danger" style="font-size: 12px">*Isi Password Jika Diubah</span>
        </div>


        <div class="mb-3 mt-3">
            <label class="form-label">Jabatan</label>
            <select class="form-select" name="jabatanpengguna" id="jabatanpengguna">
                <?php foreach ($jabatan as $j): ?>

                    <option value="<?= $j->id ?>" <?= $j->id == $detailuser['jabatan'] ? 'selected' : '' ?>>
                        <?= $j->name ?>
                    </option>
                <?php endforeach; ?>
            </select>



        </div>







        <a href="<?= base_url('/private/admin/DataPengguna') ?>" class="btn btn-secondary ">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>



</form>

<?= $this->endSection(); ?>