<?= $this->extend('Layouts/Templates'); ?>
<?= $this->section('content'); ?>

<h1>Data Barang</h1>
<hr>
<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success mt-2" role="alert">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>



<?= $this->include('TambahBarang'); ?>



<div class="row m-0">

    <?php if (!empty($pakets)) : ?>

        <?php foreach ($pakets as $p) : ?>
            <div class="col-lg-3 col-12 mb-4">
                <div class="card">
                    <img src="<?= base_url('assets/images/barang/' . $p['gambar_karung']) ?>" class="card-img-top p-1" alt="..." style="height: 250px;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $p['kode_karung'] ?></h5>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text">Jumlah Paket</p>
                            </div>
                            <div class="col-6">
                                <p class="card-text">: 100</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text">Status</p>
                            </div>
                            <div class="col-6">
                                <p class="card-text">: <?= $p['status'] ?></p>
                            </div>
                        </div>
                        <div class="mt-2">

                            <a href="<?= base_url('spxcgk4/barang/detailBarang/' . $p['kode_karung']) ?>" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>

                            <form class="d-inline" method="post" action="">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus produk ini ???')"><i class="bi bi-archive-fill"></i></i></button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        <?php endforeach ?>

    <?php else : ?>
        <p>Data Tidak Tersedia</p>
    <?php endif ?>

</div>

<script>
    $(document).ready(function() {
        <?php if (session('errors')) : ?>
            <?php if (session('modaltambah') == 'tambahbarang') : ?>
                $('#tambahpaket').modal('show');
            <?php endif ?>

        <?php endif ?>

    });
</script>



<?= $this->endSection(); ?>