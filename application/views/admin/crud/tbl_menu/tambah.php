<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2>Halaman Tambah Data</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="post" action="<?= base_url('admin/crud/Tbl_Menu/simpan');?> ">
                    <div class="form-group">
                     <input type="text" name="nama_menu" class="form-control" placeholder="Nama Menu" >
                    </div>
                    <div class="form-group">
                     <input type="number" min="1" name="no_urut_menu" class="form-control" placeholder="No Urut Menu" >
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>