<button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#tambahpaket">
    <i class="bi bi-box-fill"></i> Tambah Barang
</button>


<div class="modal fade" id="tambahpaket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('spxcgk4/barang/tambahBarang') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="d-flex flex-column">
                        <label class="form-label">Foto Barang</label>
                        <div id="my_camera" class="mx-auto mb-3 mb-md-0"></div>
                        <div id="my_result" class="mx-auto"></div>
                        <input type="hidden" name="fotobarang" id="fotobarang">
                        <button type="button" class="btn btn-info mx-2 mt-2" onclick="take_snapshot()">Ambil
                            Foto</button>

                        <?php if (session('errors.fotobarang')) : ?>
                            <span class="text-danger mt-2 "><?= session('errors.fotobarang') ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Pilih Wilayah</label>
                        <select class="form-select" aria-label="Default select example" name="wilayah">
                            <?php
                            $first = true;
                            foreach ($wilayah as $w) : ?>
                                <option value="<?= $w['id_wilayah'] ?>" <?= $first ? 'selected' : '' ?>><?= $w['nama_wilayah'] . ' - ' . $w['kodepos'] ?></option>

                            <?php $first = false;
                            endforeach; ?>
                        </select>

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
    const modal = document.getElementById('tambahpaket');

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
        document.getElementById('fotobarang').value = '';
    });

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            document.getElementById('fotobarang').value = data_uri;
            document.getElementById('my_result').innerHTML = '<img src="' + data_uri + '"/>';
        });
    }
</script>