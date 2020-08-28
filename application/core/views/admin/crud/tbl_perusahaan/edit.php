<div class="content-wrapper">
	<div class="container-fluid">
    <h1>Halaman Edit</h1>
		<form method="post">
  <div class="form-group">
    <label for="nama">NAMA</label>
    <input type="text" class="form-control" id="nama"  name="nama" placeholder="nama perusahaan" value="<?= $prshan->nama_perusahaan ?>">
  </div>
   <div class="form-group">
    <label for="alamat">ALAMAT</label>
    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat perusahaan" value="<?= $prshan->alamat_perusahaan ?>" >
  </div>
   <div class="form-group">
    <label for="pimpinan">PIMPINAN</label>
    <input type="text" class="form-control" id="pimpinan" name="pimpinan" placeholder="pimpinan peusahaan"
    value="<?= $prshan->nama_pimpinan ?>">
  </div>
   <div class="form-group">
    <label for="bidang">BIDANG</label>
    <input type="text" class="form-control" id="bidang" name="bidang" placeholder="bidang" value="<?= $prshan->bidang_usaha ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
	</div>
</div>