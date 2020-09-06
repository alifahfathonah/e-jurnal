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

<div class="content">
	<div class="container-fluid">
		<div class="row">
			
			<div class="col-lg-6">
				<table class="table table-dark" id="datatable">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                          $i=1;
						foreach ($kehadiran as $k): ?>
							<tr>
							<td><?= $i++ ?></td>
							<td><?= $k['nama_siswa']; ?></td>
							<td><a href="<?= base_url('petugas/Monitoring_Kehadiran_Siswa/siswa/').$k['id_siswa']; ?>" title="monitoring siwa" class="btn btn-secondary">kehadiran</a></td>
						<?php endforeach ?>
					</tr>
					</tbody>
				</table>		
			</div>
		
		</div>
	</div>
</div>