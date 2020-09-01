<table>
		<tr>
			<td>Nama Siswa</td>
		</tr>
		<?php foreach ($siswa as $s) { ?>
			<tr>
				<td><?= $s['nama_siswa']; ?></td>
			</tr>
		<?php } ?>
</table>
<?php die();	 ?>