<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h5 class="mb-3"><?= esc($title) ?></h5>
<div class="row">
    <div class="col">
        <div class="card card-small mb-4">

            <li class="list-group-item d-flex justify-content-between align-items-center px-3">
                <div class="btn-group" role="group">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#dataKonsumsiModal">
                        <i class="fas fa-plus"></i> Add Data
                    </button>
                </div>
            </li>

            <div class="card-body p-0 pb-3">
                <div class="table-responsive"> <!-- Tambahkan wrapper agar responsif -->
                    <table class="table mb-0 text-center">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">No</th>
                                <th scope="col" class="border-0">Kode</th>
                                <th scope="col" class="border-0">Kategori</th>
                                <th scope="col" class="border-0">Nilai</th>
                                <th scope="col" class="border-0">Keterangan</th>
                                <th scope="col" class="border-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($konsumsi as $ksm) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= esc($ksm['id']) ?></td>
                                    <td><?= esc($ksm['kategori']) ?></td>
                                    <td><?= esc($ksm['nilai']) ?></td>
                                    <td><?= esc($ksm['keterangan']) ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-sm btn-warning"
                                                onclick="openEditKonsumsiModal(this)"
                                                data-id="<?= $ksm['id'] ?>"
                                                data-kategori="<?= esc($ksm['kategori']) ?>"
                                                data-nilai="<?= esc($ksm['nilai']) ?>"
                                                data-keterangan="<?= esc($ksm['keterangan']) ?>">
                                                Edit
                                            </button>

                                            <a href="javascript:void(0);"
                                                class="btn btn-danger"
                                                onclick="deleteKonsumsi(<?= $ksm['id'] ?>)">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item ">
                    <a class="page-link" href="#" aria-current="page">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- Modal include -->
<?= $this->include('admin/pages/modals/konsumsi_modal') ?>

<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (session()->getFlashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '<?= session()->getFlashdata('success') ?>',
            timer: 2500,
            showConfirmButton: false
        });
    </script>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            html: '<?= session()->getFlashdata('error') ?>',
            confirmButtonText: 'OK'
        });
    </script>
<?php endif; ?>

<script>
    function deleteKonsumsi(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Skala tingkat konsumsi ikan yang dihapus tidak bisa dikembalikan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke route delete
                window.location.href = "<?= base_url('deleteKonsumsi') ?>/" + id;
            }
        });
    }
</script>

<?= $this->endSection() ?>