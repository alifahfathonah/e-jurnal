  <!-- ############################ BEGIN OF CONTENT ############################### -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><?= $judul; ?></h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- ############################ BEGIN OF CONTENT ############################### -->
        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
            	<form action="<?= base_url('siswa/Kegiatan/edit'); ?>" method="post" class="form-group ml-3">
                <input type="hidden" name="id" value="<?=$uraian_kegiatan['id_kegiatan']; ?>" class="form-control col-lg-4 mt-2" readonly>
                <div class="form-group">
                <input type="text" name="tanggal" value="<?=$uraian_kegiatan['tanggal']; ?>" readonly class="form-control col-lg-4 mt-2">
                </div>
                <div class="form-group col-lg-6">
                <textarea name="uraian_kegiatan" id="ckeditor" cols="30" rows="10"><?= $uraian_kegiatan['uraian_kegiatan'] ?></textarea>
                </div>
                <div class="form-group">
                <input type="submit" name="kirim" class="btn btn-primary mt-3" value="simpan">
                </div>
    </form>



            

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->	


</body>
</html>