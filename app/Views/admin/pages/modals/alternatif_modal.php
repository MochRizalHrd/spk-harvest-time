<!-- Modal -->
<div class="modal fade" id="dataAlternatifModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form
            method="POST" enctype="multipart/form-data"
            id="alternatifForm"
            class="modal-content border-0 shadow rounded-4 overflow-hidden"
            action="<?= base_url('addAlternatif') ?>">
            <?= csrf_field() ?>

            <!-- Akan diubah oleh JavaScript saat edit -->
            <input type="hidden" name="id" id="alternatif_id">
            <input type="hidden" name="_method" id="form_method" value="POST">

            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold d-flex align-items-center gap-2" id="dataModalLabel">
                    Add Alternatif / Edit Alternatif
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Alternatif</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                </div>

                <div class="mb-3">
                    <label for="umur_ikan" class="form-label">Umur Ikan</label>
                    <input type="number" name="umur_ikan" class="form-control" id="umur_ikan" required min="1">
                </div>

                <div class="mb-3">
                    <label for="rata_rata_ikan" class="form-label">Berat Rata Rata Ikan</label>
                    <input type="number" name="rata_rata_ikan" class="form-control" id="rata_rata_ikan" required min="1">
                </div>

                <div class="mb-3">
                    <label for="tingkat_konsumsi" class="form-label">Tingkat Konsumsi Ikan</label>
                    <input type="number" name="tingkat_konsumsi" class="form-control" id="tingkat_konsumsi" required min="1">
                </div>

                <div class="mb-3">
                    <label for="aktivitas_ikan" class="form-label">Aktivitas Ikan</label>
                    <input type="text" name="aktivitas_ikan" class="form-control" id="aktivitas_ikan" required min="1">
                </div>

                <div class="mb-3">
                    <label for="tingkat_kematian" class="form-label">Tingkat Kematian Ikan</label>
                    <input type="text" name="tingkat_kematian" class="form-control" id="tingkat_kematian" required min="1">
                </div>
            </div>


            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" id="submitBtn">Add</button>
            </div>
        </form>
    </div>
</div>

<!-- SCRIPT -->
<script>
    // Menampilkan form tambah domba
    function openAddAlternatif() {
        // Reset Form
        const form = document.getElementById('alternatifForm');
        form.reset();

        // Atur action form untuk "Add"
        form.action = "<?= base_url('addAlternatif') ?>";

        // Ganti label dan tombol
        document.getElementById('dataModalLabel').innerHTML = '<i class="material-icons">person</i> Add Alternatif';
        document.getElementById('submitBtn').innerText = 'Add';

        // Kosongkan field value secara eksplisit
        document.querySelector('input[name="id"]').value = '';
        document.getElementById('nama').value = '';
        document.getElementById('umur_ikan').value = '';
        document.getElementById('rata_rata_ikan').value = '';
        document.getElementById('tingkat_konsumsi').value = '';
        document.getElementById('aktivitas_ikan').value = '';
        document.getElementById('tingkat_kematian').value = '';

        // Tampilkan modal
        $('#dataAlternatifModal').modal('show');
    }

    // Menampilkan Form Edit
    function openEditAlternatifModal(button) {
        const id = button.getAttribute('data-id');
        const nama = button.getAttribute('data-nama');
        const umur_ikan = button.getAttribute('data-umur_ikan');
        const rata_rata_ikan = button.getAttribute('data-rata_rata_ikan');
        const tingkat_konsumsi = button.getAttribute('data-tingkat_konsumsi');
        const aktivitas_ikan = button.getAttribute('data-aktivitas_ikan');
        const tingkat_kematian = button.getAttribute('data-tingkat_kematian');


        const form = document.getElementById('alternatifForm');
        form.action = "<?= base_url('editAlternatif') ?>/" + id;

        document.querySelector('input[name="id"]').value = id;
        document.querySelector('input[name="nama"]').value = nama;
        document.querySelector('input[name="umur_ikan"]').value = umur_ikan;
        document.querySelector('input[name="rata_rata_ikan"]').value = rata_rata_ikan;
        document.querySelector('input[name="tingkat_konsumsi"]').value = tingkat_konsumsi;
        document.querySelector('input[name="aktivitas_ikan"]').value = aktivitas_ikan;
        document.querySelector('input[name="tingkat_kematian"]').value = tingkat_kematian;


        // Ubah label dan tombol
        document.getElementById('dataModalLabel').innerHTML = 'Edit Alternatif';
        document.getElementById('submitBtn').innerText = 'Update';

        // Tampilkan modal
        $('#dataAlternatifModal').modal('show');
    }
</script>