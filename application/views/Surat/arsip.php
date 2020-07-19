<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <?= form_error('arsip', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('surat/arsip') ?>" method="post">
                <div class="input-group">
                    <select class="custom-select" id="flag" name="flag" aria-label="Example select with button addon">
                        <option value="">Pilih surat</option>
                        <option value="1">Surat Keterangan Izin Usaha</option>
                        <option value="2">Surat Keterangan Domisili</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Tampilkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Surat</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Pemohon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nama Usaha</th>
                        <th scope="col">Bidang Usaha</th>
                        <th scope="col">Alamat Usaha</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($surat as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['nama_surat']; ?></td>
                            <td><?= date('d F Y', $s['tanggal']) ?></td>
                            <td><?= $s['nama_pemohon']; ?></td>
                            <td><?= $s['alamat_pemohon']; ?></td>
                            <td><?= $s['nama_usaha']; ?></td>
                            <td><?= $s['jenis_usaha']; ?></td>
                            <td><?= $s['alamat_usaha']; ?></td>

                            <td>
                                <a href="<?= base_url('surat/hapussurat/') . $s['id']; ?>" class="badge badge-danger" data-id="<?= $s['id'] ?>" data-menu="<?= $this->uri->segment(1); ?>" data-method="hapusSurat">hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->