<!-- Modal -->
<div class="modal fade" id="dataRataModal" tabindex="-1" role="dialog" aria-labelledby="dataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form
            method="POST" enctype="multipart/form-data"
            id="rataForm"
            class="modal-content border-0 shadow rounded-4 overflow-hidden"
            action="<?= base_url('addRata') ?>">
            <?= csrf_field() ?>

            <!-- Akan diubah oleh JavaScript saat edit -->
            <input type="hidden" name="id" id="rata_id">
            <input type="hidden" name="_method" id="form_method" value="POST">

            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold d-flex align-items-center gap-2" id="dataModalLabel" onclick="openAddRata()">
                    Add Skala Berat Rata-Rata Ikan / Edit Skala Berat Rata-Rata Ikan
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" id="kategori" required>
                </div>

                <div class="mb-3">
                    <label for="nilai" class="form-label">Nilai</label>
                    <input type="number" name="nilai" class="form-control" id="nilai" required min="1">
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="keterangan" required>
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
    function openAddRata() {
        // Reset Form
        const form = document.getElementById('rataForm');
        form.reset();

        // Atur action form untuk "Add"
        form.action = "<?= base_url('addRata') ?>";

        // Ganti label dan tombol
        document.getElementById('dataModalLabel').innerHTML = '<i class="material-icons">person</i> Add Skala Berat Rata-Rata Ikan';
        document.getElementById('submitBtn').innerText = 'Add';

        // Kosongkan field value secara eksplisit
        document.querySelector('input[name="id"]').value = '';
        document.getElementById('kategori').value = '';
        document.getElementById('nilai').value = '';
        document.getElementById('keterangan').value = '';

        // Tampilkan modal
        $('#dataRataModal').modal('show');
    }

    // Menampilkan Form Edit
    function openEditRataModal(button) {
        const id = button.getAttribute('data-id');
        const kategori = button.getAttribute('data-kategori');
        const nilai = button.getAttribute('data-nilai');
        const keterangan = button.getAttribute('data-keterangan');


        const form = document.getElementById('rataForm');
        form.action = "<?= base_url('editRata') ?>/" + id;

        document.querySelector('input[name="id"]').value = id;
        document.querySelector('input[name="kategori"]').value = kategori;
        document.querySelector('input[name="nilai"]').value = nilai;
        document.querySelector('input[name="keterangan"]').value = keterangan;


        // Ubah label dan tombol
        document.getElementById('dataModalLabel').innerHTML = 'Edit Skala Berat Rata-Rata Ikan';
        document.getElementById('submitBtn').innerText = 'Update';

        // Tampilkan modal
        $('#dataRataModal').modal('show');
    }
</script>