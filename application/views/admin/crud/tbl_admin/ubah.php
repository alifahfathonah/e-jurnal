<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2>Halaman ubah Data</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="post">
                    <div class="form-group">
                        <label for="siswa">ADMIN</label>
                        <select class="form-control" id="siswa" name="user_id">
                            <?php foreach ($this->db->get('tbl_user')->result_array() as $usr) {
                            ?>
                                <option value="<?= $usr['id_user']; ?>"><?= $usr['username']; ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>