<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2>Halaman Tambah Data</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="post" action="<?= base_url('Admin/Crud/Tbl_menu/simpan');?> ">
                    <div class="form-group">
                     <input type="text" name="nama_menu" class="form-control" placeholder="Enter Name Menu" >
                     <hr>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>