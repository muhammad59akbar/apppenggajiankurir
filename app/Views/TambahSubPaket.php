<button type="button" class="btn btn-primary m-2 d-block" data-bs-toggle="modal" data-bs-target="#tambahsubpaket">
    <i class="bi bi-box-fill"></i> Tambah Paket
</button>


<div class="modal fade" id="tambahsubpaket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Paket</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('spxcgk4/barang/subbarang/tambahsubBarang') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_karung" value="<?= $pakets['id_karung'] ?>">

                    <div class="d-flex flex-column">
                        <label class="form-label">Foto Paket</label>
                        <div id="my_camera" class="mx-auto mb-3 mb-md-0"></div>
                        <div id="my_result" class="mx-auto"></div>
                        <input type="hidden" name="fotosubpaket" id="fotosubpaket">
                        <button type="button" class="btn btn-info mx-2 mt-2" onclick="take_snapshot()">Ambil
                            Foto</button>
                        <?php if (session('errors.fotosubpaket')) : ?>
                            <span class="text-danger mt-2 "><?= session('errors.fotosubpaket') ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="my-2">
                        <label class="form-label">Kode Paket Shoppe</label>
                        <input type="text" name="kodepkt" id="kodepkt" class="form-control <?= session('errors.kodepkt') ? 'is-invalid' : '' ?>" value="<?= old('kodepkt') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.kodepkt') ?>
                        </div>
                    </div>

                    <div class="my-2">
                        <label class="form-label">Alamat Pengiriman</label>
                        <input type="text" name="alamat" id="alamat" class="form-control <?= session('errors.alamat') ? 'is-invalid' : '' ?>" value="<?= old('alamat') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.alamat') ?>
                        </div>
                    </div>
                    <div class="my-2">
                        <label class="form-label">No Telp</label>
                        <input type="text" name="notelp" id="notelp" class="form-control <?= session('errors.notelp') ? 'is-invalid' : '' ?>" value="<?= old('notelp') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.notelp') ?>
                        </div>
                    </div>





                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<script language="JavaScript">
    const modal = document.getElementById('tambahsubpaket');

    modal.addEventListener('shown.bs.modal', function() {
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
        });
        Webcam.attach('#my_camera');
    });
    modal.addEventListener('hidden.bs.modal', function() {
        Webcam.reset();
        document.getElementById('my_result').innerHTML = '';
        document.getElementById('fotosubpaket').value = '';
    });

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            document.getElementById('fotosubpaket').value = data_uri;
            document.getElementById('my_result').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }
</script>