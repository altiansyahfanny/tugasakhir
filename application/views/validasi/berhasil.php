<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Validasi</title>
</head>

<body>
  <div class="container mt-2">
    <div class="row">
      <div class="col-lg-12">
        <div class="card m-2">
          <div class="card-header">
            Surat Keterangan Domisili Usaha
          </div>
          <div class="card-body">
            <h5 class="card-title">Surat <b>SAH</b></h5>
            <p>Data Pemohon :</p>

            <form>
              <div class="row">
                <div class="col-sm-10 offset-1">
                  <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="nama" value="<?= $surat['nama_pemohon']; ?>" readonly>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-10 offset-1">
                  <div class="form-group row">
                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="jk" value="<?= $surat['jk']; ?>" readonly>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-10 offset-1">
                  <div class="form-group row">
                    <label for="ttl" class="col-sm-2 col-form-label">Tempat/Tanggal Lahir</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="ttl" value="<?= $surat['ttl']; ?>" readonly>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-10 offset-1">
                  <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" id="alamat" rows="3" placeholder="<?= $surat['alamat_pemohon']; ?>" readonly></textarea>
                    </div>
                  </div>
                </div>
              </div>



              <p>Data Perusahaan / Usaha :</p>
              <div class="row">
                <div class="col-sm-10 offset-1">
                  <div class="form-group row">
                    <label for="nama_usaha" class="col-sm-2 col-form-label">Nama Usaha / Perusahaan</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="nama_usaha" value="<?= $surat['nama_usaha']; ?>" readonly>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-10 offset-1">
                  <div class="form-group row">
                    <label for="nama_pimpinan" class="col-sm-2 col-form-label">Nama Pimpinan</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="nama_pimpinan" value="<?= $surat['pj_usaha']; ?>" readonly>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-10 offset-1">
                  <div class="form-group row">
                    <label for="jenis_usaha" class="col-sm-2 col-form-label">Jenis Usaha</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="jenis_usaha" value="<?= $surat['jenis_usaha']; ?>" readonly>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-10 offset-1">
                  <div class="form-group row">
                    <label for="alamat_usaha" class="col-sm-2 col-form-label">Alamat Usaha / Perusahaan</label>
                    <div class="col-sm-6">
                      <textarea class="form-control" id="alamat_usaha" rows="3" placeholder="<?= $surat['alamat_usaha']; ?>" readonly></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>