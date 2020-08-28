<table class="tbl tbl-dark">
	<tr>
		<td>TANGGAL</td>
		<td>NAMA PETUGAS MONITORING</td>
		<td>SARAN PETUGAS MONITORING</td>
		<td>STATUS</td>
<?php foreach ($catatan_monitoring as $cm) : { ?>
	</tr>
	<tr>
		<td><?= $cm['tanggal']; ?></td>
		<td><?= $cm['nama_petugas_monitoring']; ?></td>
		<td><?= $cm['saran']; ?></td>
<?php } ?>
	</tr>
</table>