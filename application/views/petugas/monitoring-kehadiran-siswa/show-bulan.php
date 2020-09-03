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
				<table class="table"id="datatable">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Bulan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
				<?php 
				$i=1;
				foreach ($bulan_aktif as $kB): ?>
					<tr>
						<td><?= $i++ ?></td>
						<td><?= $kB['nama_bulan']; ?></td>
						<td><a href="<?= base_url('Petugas/Monitoring_Kehadiran_Siswa/show_kehadiran_siswa/'.$id_siswa.'/').$kB['id_bulan']; ?>">Lihat</a></td>
					</tr>
				<?php endforeach ?>
				</tbody>
				</table>		
			</div>
		
		</div>	
	</div>
</div>