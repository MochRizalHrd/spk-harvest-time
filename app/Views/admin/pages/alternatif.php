<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<h5 class="mb-3"><?= esc($title) ?></h5>
<div class="row">
    <div class="col">
        <div class="card card-small mb-4">

            <li class="list-group-item d-flex justify-content-between align-items-center px-3">
                <!-- <span class="font-weight-bold">Data Kriteria</span> -->
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#dataAlternatifModal">
                    <i class="fas fa-plus"></i> Add Data

                </button>
            </li>

            <div class="card-body p-0 pb-3">
                <div class="table-responsive">
                    <table class="table mb-0 text-center">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0">No</th>
                                <th scope="col" class="border-0">Kode</th>
                                <th scope="col" class="border-0">Nama Alternatif</th>
                                <th scope="col" class="border-0">Umur Ikan</th>
                                <th scope="col" class="border-0">Berat Rata-Rata Ikan</th>
                                <th scope="col" class="border-0">Tingkat Konsumsi Ikan</th>
                                <th scope="col" class="border-0">Aktivitas Ikan</th>
                                <th scope="col" class="border-0">Tingkat Kematian Ikan</th>
                                <th scope="col" class="border-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($alternatif as $alt) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= esc($alt['kode']) ?></td>
                                    <td><?= esc($alt['nama']) ?></td>
                                    <td><?= esc($alt['umur_ikan']) ?></td>
                                    <td><?= esc($alt['rata_rata_ikan']) ?></td>
                                    <td><?= esc($alt['tingkat_konsumsi']) ?></td>
                                    <td><?= esc($alt['aktivitas_ikan']) ?></td>
                                    <td><?= esc($alt['tingkat_kematian']) ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-sm btn-warning"
                                                onclick="openEditAlternatifModal(this)"
                                                data-id="<?= esc($alt['id']) ?>"
                                                data-kode="<?= esc($alt['kode']) ?>"
                                                data-nama="<?= esc($alt['nama']) ?>"
                                                data-umur_ikan="<?= esc($alt['umur_ikan']) ?>"
                                                data-rata_rata_ikan="<?= esc($alt['rata_rata_ikan']) ?>"
                                                data-tingkat_konsumsi="<?= esc($alt['tingkat_konsumsi']) ?>"
                                                data-aktivitas_ikan="<?= esc($alt['aktivitas_ikan']) ?>"
                                                data-tingkat_kematian="<?= esc($alt['tingkat_kematian']) ?>">
                                                Edit
                                            </button>

                                            <a href="javascript:void(0);"
                                                class="btn btn-danger"
                                                onclick="deleteAlternatif(<?= $alt['id'] ?>)">
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
<?= $this->include('admin/pages/modals/alternatif_modal') ?>

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
    function deleteAlternatif(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data alternatif yang dihapus tidak bisa dikembalikan.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke route delete
                window.location.href = "<?= base_url('deleteAlternatif') ?>/" + id;
            }
        });
    }
</script>

<?= $this->endSection() ?>