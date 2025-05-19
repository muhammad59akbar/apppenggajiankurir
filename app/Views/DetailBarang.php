<?= $this->extend('Layouts/Templates'); ?>
<?= $this->section('content'); ?>

<h1>List Barang <span><?= $pakets['kode_karung'] ?></span></h1>
<hr>

<a href="<?= base_url('/spxcgk4/barang/DataBarang') ?>" class="m-2">&laquo; Kembali</a>


<?= $this->include('TambahSubPaket'); ?>



<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success mt-2" role="alert">
        <?= session()->getFlashdata('message') ?>
    </div>
<?php endif; ?>
<?php if (!empty($subpaket)) : ?>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Paket</th>
                    <th scope="col" style="min-width:200px;">Alamat</th>
                    <th scope="col">Foto Barang</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col" style="min-width:100px;">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                foreach ($subpaket as $spaket) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $spaket['kode_paket'] ?></td>
                        <td><?= $spaket['alamat_pengantaran'] ?></td>
                        <td><a href="<?= base_url('assets/images/subbarang/' . $spaket['foto_subpaket']) ?>"><img src="<?= base_url('assets/images/subbarang/' . $spaket['foto_subpaket']) ?>"></a></td>
                        <td><?= $spaket['no_telp'] ?></td>
                        <td><?= $spaket['status'] ?></td>
                        <td>test</td>
                    </tr>

                <?php endforeach ?>

            </tbody>
        </table>
    </div>


<?php else : ?>
    <p class="m-2">Data tidak tersedia</p>
<?php endif; ?>


<script>
    $(document).ready(function() {
        <?php if (session('errors')) : ?>
            <?php if (session('modaltambahsub') == 'tambahsubbarang') : ?>
                $('#tambahsubpaket').modal('show');
            <?php endif ?>

        <?php endif ?>

    });
</script>

<?= $this->endSection(); ?>