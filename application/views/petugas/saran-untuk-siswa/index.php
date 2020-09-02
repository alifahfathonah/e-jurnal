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
		<?php $this->load->view('layouts/components/alert-bootstrap'); ?>
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
						foreach ($nama as $n): ?>
							<tr>
							<td><?= $i++ ?></td>
							<td><?= $n['nama_siswa']; ?></td>
							<td><a href="<?= base_url('Petugas/Saran_Siswa/create/').$n['id_siswa']; ?>" title="monitoring siwa" class="btn btn-primary"><i class="fas fa-paper-plane"></i></a> 		
                             <a href="<?= base_url('Petugas/Saran_Siswa/show_saran/').$n['id_siswa']; ?>"class="btn btn-success"><i class="fas fa-info-circle"></i></a>
							</td>
						<?php endforeach ?>
					</tr>
					</tbody>
				</table>		
			</div>
		
		</div>
	</div>
</div>