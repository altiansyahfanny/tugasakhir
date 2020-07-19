<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> : Keterangan Domisili Usaha</h1>

    <div class="row">
        <div class="col-lg-6">
            <form action="<?= base_url('surat/caripenduduk') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Cari nama penduduk" autocomplete="off">
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div id="result"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h4>Data Surat</h4>
            <hr>
            <form action="<?= base_url('surat/keterangan_domisili_usaha') ?>" method="post">
                <div class="form-group">
                    <label for="no_surat">No. Surat</label>
                    <input type="text" class="form-control" id="no_surat" name="no_surat">
                    <?= form_error('no_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h4>Data Pemohon</h4>
            <hr>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="no_ktp">No. KTP</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp">
                <?= form_error('no_ktp', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="ttl">Tempat/Tanggal Lahir</label>
                <input type="text" class="form-control" id="ttl" name="ttl">
                <?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <input type="text" class="form-control" id="jk" name="jk">
                <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="kewarganegaraan">Kewarganegaraan</label>
                <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan">
                <?= form_error('kewarganegaraan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="agama">Agama</label>
                <input type="text" class="form-control" id="agama" name="agama">
                <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <h4 class="mt-3">Data Penanggung Jawab Surat</h4>
            <hr>
            <div class="form-group">
                <label for="pejabat_kelurahan">Nama Pejabat Kelurahan</label>
                <input type="text" class="form-control" id="pejabat_kelurahan" name="pejabat_kelurahan">
                <?= form_error('pejabat_kelurahan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="nip">NIP Pejabat Kelurahan</label>
                <input type="text" class="form-control" id="nip" name="nip">
                <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan">
                <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <!-- <div class="form-group">
                <label for="pejabat_kecamatan">Nama Camat</label>
                <input type="text" class="form-control" id="pejabat_kecamatan" name="pejabat_kecamatan">
                <?= form_error('pejabat_kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="nip_pj_kecamatan">NIP Pejabat Kecamatan</label>
                <input type="text" class="form-control" id="nip_pj_kecamatan" name="nip_pj_kecamatan">
                <?= form_error('nip_pj_kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="jabatan_pejabat_kecamatan">Jabatan Pejabat Kecamatan</label>
                <input type="text" class="form-control" id="jabatan_pejabat_kecamatan" name="jabatan_pejabat_kecamatan">
                <?= form_error('jabatan_pejabat_kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div> -->
        </div>

        <div class="col-lg-6">

            <h4>Data Usaha</h4>
            <hr>
            <div class="form-group">
                <label for="nama_usaha">Nama Usaha / Perusahaan</label>
                <input type="text" class="form-control" id="nama_usaha" name="nama_usaha">
                <?= form_error('nama_usaha', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="pimpinan">Penanggung Jawab / Pimpinan Perusahaan</label>
                <input type="text" class="form-control" id="pimpinan" name="pimpinan">
                <?= form_error('pimpinan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="jenis_usaha">Jenis / Klasifikasi Usaha</label>
                <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha">
                <?= form_error('jenis_usaha', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="barang_produksi">Produksi / Barang Dagangan</label>
                <input type="text" class="form-control" id="barang_produksi" name="barang_produksi">
                <?= form_error('barang_produksi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="alamat_usaha">Alamat Usaha</label>
                <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha">
                <?= form_error('alamat_usaha', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="jumlah_karyawan">Jumlah Karyawan</label>
                <input type="text" class="form-control" id="jumlah_karyawan" name="jumlah_karyawan">
                <?= form_error('jumlah_karyawan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="sts_bangunan">Status Bangunan</label>
                <input type="text" class="form-control" id="sts_bangunan" name="sts_bangunan">
                <?= form_error('sts_bangunan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="peruntukan_bangunan">Peruntukan Bangunan</label>
                <input type="text" class="form-control" id="peruntukan_bangunan" name="peruntukan_bangunan">
                <?= form_error('peruntukan_bangunan', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group form-group row justify-content-end">
                <button class="btn btn-primary mr-2" type="sumbit" name="tbl_buat" target="_blank">Buat</button>
                <button class="btn btn-danger mr-3" type="reset" name="tbl_batal">Reset</button>
            </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->