<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row mb-3">
        <div class="col-md-6">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-2 tambahPenduduk" data-toggle="modal" data-target="#newPendudukModal">Tambah Penduduk</a>

            <form action="<?= base_url('penduduk/cari') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" placeholder="Masukan nama penduduk">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text" id="basic-addon2">
                            <span><i class="fas fa-search"></i></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md">

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Dusun</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penduduk as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p['nik']; ?></td>
                            <td><?= $p['nama']; ?></td>
                            <td><?= $p['content_dusun']; ?></td>
                            <td><?= $p['alamat']; ?></td>
                            <td>
                                <a href="" class="badge badge-success ubahPenduduk" data-toggle="modal" data-target="#newPendudukModal" data-id="<?= $p['id_penduduk'] ?>">edit</a>
                                <a href="" class="badge badge-danger" data-id="<?= $p['id_penduduk'] ?>" data-menu="<?= $this->uri->segment(1); ?>" data-method="hapusPenduduk">hapus</a>
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


<!-- Modal -->
<div class="modal fade" id="newPendudukModal" tabindex="-1" role="dialog" aria-labelledby="newPendudukLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPendudukLabel">Tambah Penduduk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('penduduk') ?>" method="post">
                <input type="hidden" id="id" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Nomer KTP">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tmpt_tgl_lahir" name="tmpt_tgl_lahir" placeholder="Tempat Tanggal Lahir">
                    </div>
                    <div class="form-group">
                        <select name="agama" id="agama" class="form-control">
                            <option value="">Agama</option>
                            <?php foreach ($agama as $a) : ?>
                                <option value="<?= $a['id_agama'] ?>"><?= $a['content_agama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <select name="dusun" id="dusun" class="form-control">
                            <option value="">Dusun</option>
                            <?php foreach ($dusun as $a) : ?>
                                <option value="<?= $a['id_dusun'] ?>"><?= $a['content_dusun']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="rt" name="rt" placeholder="RT">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="rw" name="rw" placeholder="RW">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="jk" name="jk" placeholder="Jenis Kelamin">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" placeholder="Kewarganegaraan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="sts_kawin" name="sts_kawin" placeholder="Status Kawin">
                    </div>
                    <div class="form-group">
                        <select name="pendidikan" id="pendidikan" class="form-control">
                            <option value="">Pendidikan</option>
                            <?php foreach ($pendidikan as $a) : ?>
                                <option value="<?= $a['id_pendidikan'] ?>"><?= $a['content_pendidikan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="suku" name="suku" placeholder="Suku">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailPenduduk" tabindex="-1" role="dialog" aria-labelledby="detailPendudukLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailPendudukLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for=""></label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>