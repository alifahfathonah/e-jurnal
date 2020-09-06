<div class="card">
            <div class="card-header">
              <a href="<?= base_url('admin/crud/tbl-siswa') ?>" class="btn btn-success">Kembali</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="<?= base_url('admin/crud/Tbl_Siswa/').$action ?>">
              <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="" id="nama_siswa" class="form-control" name="nama_siswa">
              </div>
              <div class="form-group">
                <label for="nis">Nis</label>
                <input type="" id="nis" class="form-control" name="nis">
              </div>
              
              <div class="form-group">
                <label for="s">Username & Email Dari User</label>
                
                <select name="user_id" id="s" class="form-control">
                  <?php if ($user_siswa): ?>
                    <?php foreach ($user_siswa as $u_siswa): ?>
                    <option value="<?= $u_siswa['id_user'] ?>"><?= $u_siswa['username'] ?> || <?= $u_siswa['email'] ?></option>  
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option>Kosong</option>
                  <?php endif; ?>
                </select>

              </div>

              <div class="form-group">
                <label for="kls">Kelas</label>
                
                <select name="kelas_id" id="kls" class="form-control">
                  <?php if ($all_kelas): ?>
                    <?php foreach ($all_kelas as $kelas): ?>
                    <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>  
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option>Kosong</option>
                  <?php endif; ?>
                </select>

              </div>

              <div class="form-group">
                <label for="jrs">Jurusan</label>
                
                <select name="jurusan_id" id="jrs" class="form-control">
                  <?php if ($all_jurusan): ?>
                    <?php foreach ($all_jurusan as $jurusan): ?>
                    <option value="<?= $jurusan['id_jurusan'] ?>"><?= $jurusan['nama_jurusan'] ?></option>  
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option>Kosong</option>
                  <?php endif; ?>
                </select>

              </div>

              <div class="form-group">
                <label for="prs">Perusahaan</label>
                
                <select name="perusahaan_id" id="s" class="form-control">
                  <?php if ($all_perusahaan): ?>
                    <?php foreach ($all_perusahaan as $perusahaan): ?>
                    <option value="<?= $perusahaan['id_perusahaan'] ?>"><?= $perusahaan['nama_perusahaan'] ?></option>  
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option>Kosong</option>
                  <?php endif; ?>
                </select>

              </div>

              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="" id="tempat_lahir" class="form-control" name="tempat_lahir">
              </div>
              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir">
              </div>
              <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="">- PILIH JENIS KELAMIN -</option>
                    <option value="Laki-Laki">Laki-Laki</option>  
                    <option value="Perempuan">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="alamat_siswa">Alamat Siswa</label>
                <input type="" id="alamat_siswa" class="form-control" name="alamat_siswa">
              </div>
              <div class="form-group">
                <label for="nama_orang_tua">Nama Orang Tua</label>
                <input type="" id="nama_orang_tua" class="form-control" name="nama_orang_tua">
              </div>
              <div class="form-group">
                <label for="alamat_orang_tua">Alamat Orang Tua</label>
                <input type="" id="alamat_orang_tua" class="form-control" name="alamat_orang_tua">
              </div>

              
              <div class="form-group">
              <button class="btn btn-primary" type="submit">Tambah</button>
              </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->