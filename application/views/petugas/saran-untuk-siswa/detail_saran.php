<div class="content-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div class="card col-5 mt-5">
					<div class="card-header bg-dark">
						<p>Detail Saran</p>
						<a href="#" id="show-edit" data-togle="modal" data-target="show-saran" data-id-saran="<?= $detail_saran['id_saran'] ?>"><i class="fas fa-edit btn btn-primary" style="margin-left: 360px;"></i></a>
					</div>
						<div class="card-body">
							<label>Saran</label>

							<p><?= $detail_saran['isi_saran']; ?></p>
						</div>
					
					<div class="card-footer">
						<a href="<?= base_url('petugas/Saran'); ?>" class="btn btn-primary">Kembali</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="show-saran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="post" action="<?= base_url('petugas/Saran_Siswa/update_saran') ?>">
        <div class="form-group" id="saran">
        	<input type="hidden" name="id_saran">
        	<textarea id="" class="form-control" name="isi_saran"></textarea>
<!--         	<input class="form-control" type="" name="isi_saran"> -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Update</button>
      	</form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){

		$("#show-edit").click(function(){
			var id_saran = $(this).data('id-saran')
			$.ajax({
				type: 'GET',
				url: "<?= base_url('petugas/Saran_Siswa/showEditSaran/') ?>"+id_saran,
				success:function(response){
					var result = JSON.parse(response)
					$("#show-saran").modal("show")
					$("[name='id_saran']").val(result.id_saran)
					$("[name='isi_saran']").val(result.isi_saran)
				},
				error:function(){
					alert('error')
				},
			})
		})
		
	})
</script>