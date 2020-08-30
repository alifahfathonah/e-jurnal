    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= $judul; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form method="POST" action="<?= base_url('siswa/identitas/store') ?>">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">Lengkapi data dibawah ini</div>
              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" value="<?= $user['id_user'] ?>" name="user_id">
                  <input class="form-control" placeholder="Nama Siswa" name="nama_siswa"></input>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Nis" name="nis"></input>
                </div>
                <div class="form-group">
                  <select name="kelas_id" class="form-control">
                    <option value="3">-- KELAS --</option>
                    <?php foreach ($all_kelas as $kelas): ?>
                      <option value="<?= $kelas['id_kelas'] ?>">- <?= $kelas['nama_kelas'] ?> -</option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <select name="jurusan_id" class="form-control">
                    <option>-- JURUSAN --</option>
                    <?php foreach ($all_jurusan as $jurusan): ?>
                      <option value="<?= $jurusan['id_jurusan'] ?>">- <?= strtoupper($jurusan['nama_jurusan']); ?> -</option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group">
                  <select name="jenis_kelamin" class="form-control">
                    <option value="">-- JENIS KELAMIN --</option>
                      <option value="Laki-laki">- LAKI-LAKI -</option>
                      <option value="Perempuan">- PEREMPUAN -</option>
                  </select>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Tempat Lahir" name="tempat_lahir"></input>
                </div>
                <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir"></input>
                </div>
                <div class="form-group">
                  <label for="alamat_siswa">Alamat Siswa</label>
                  <input class="form-control" id="alamat_siswa" placeholder="example:Cikunten,Singaparna,Tasikmalaya" name="alamat_siswa"></input>
                </div>
                <div class="form-group">
                  <label for="no_telp">No Hp atau Whatsapp</label>
                  <input class="form-control" id="no_telp" placeholder="" value="+62" name="no_telp"></input>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Nama Orang Tua" name="nama_orang_tua"></input>
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Alamat Orang Tua" name="alamat_orang_tua"></input>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary">KONFIRMASI</button>
                </div>
              </div>
              <div class="card-footer"></div>
            </div>
          </div>
        </div>
        </form>  
          
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->