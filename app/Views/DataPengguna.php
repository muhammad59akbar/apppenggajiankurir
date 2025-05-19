<?= $this->extend('Layouts/Templates'); ?>
<?= $this->section('content'); ?>


<h1>Data Pengguna</h1>
<hr>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success mt-2" role="alert">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>


<?= $this->include('TambahPengguna'); ?>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telp</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($userCGK as $u) : ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <td><?= $u['username'] ?></td>
                    <td><?= $u['email'] ?></td>
                    <td><?= $u['namalengkap'] ?></td>
                    <td><?= $u['alamat'] ?></td>
                    <td><?= $u['notelp'] ?></td>
                    <td><?= $u['nama_jabatan'] ?></td>
                    <td>
                        <a href="<?= base_url('private/admin/detailPengguna/' . $u['username']) ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                        <form class="d-inline" method="post" action="<?= base_url('private/admin/deletePengguna/' . $u['id']) ?>">

                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus Pengguna ini ???')"><i class="bi bi-archive-fill"></i></button>
                        </form>
                    </td>

                </tr>

            <?php endforeach ?>

        </tbody>
    </table>

</div>


<script>
    $(document).ready(function() {
        <?php if (session('errors')) : ?>

            $('#tambahpengguna').modal('show');

        <?php endif; ?>
    });
</script>


<?= $this->endSection(); ?>