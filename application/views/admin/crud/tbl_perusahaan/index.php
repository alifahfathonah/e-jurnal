
<div class="content-wrapper">
<?= $this->session->flashdata('message'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h4>Data Perusahaan</h4>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <a href="<?= base_url('Admin/Crud/Tbl_Perusahaan/tambah');?>" class="btn btn-primary">Tambah data</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

        
            <table class="table table-dark" border="1">
                <thead>
                    <tr>
                        <th scope="col">NO</th>
                        <th scope="col">NAMA PERUSAHAAN</th>
                        <th scope="col">ALAMAT PERUSAHAAN</th>
                        <th scope="col">PIMPINAN</th>
                        <th scope="col">BIDANG USAHA</th>
                        <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                        $i = 1;
                        foreach ($perusahaan as $p) {

                        ?>
                        <tr>
                            <th scope="row"><?= $i++ ?></th>
                            <td><?= $p['nama_perusahaan']; ?></td>
                            <td><?= $p['alamat_perusahaan']; ?></td>
                            <td><?= $p['nama_pimpinan']; ?></td>
                            <td><?= $p['bidang_usaha']; ?></td>
                            <td>
                                <a href="<?= base_url('Admin/Crud/Tbl_Perusahaan/delete/').$p['id_perusahaan']; ?>" class="btn btn-danger" onclick="return confirm('hapus?') "><i class="fas fa-fw fa-trash"></i>
                                <a href="<?= base_url('Admin/Crud/Tbl_Perusahaan/edit/').$p['id_perusahaan']; ?>" class="btn btn-primary mt-2"><i class="fas fa-fw fa-edit"></i></a>
                            </td>
                    </tr>
                    <?php } ?>
                </tbody>
        </table>
                </div>  
             </div>
        </div>
    </div>
</div>