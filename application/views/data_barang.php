<div class="col-5 mt-3">
    <div class="card border-info">
        <div class="card-header bg-info text-white">
            List Barang
            <a href="" class="btn border-primary bg-light ml-2" data-toggle="modal" data-target="#tambah">&plus;</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>JENIS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($barang as $row) {
                    ?>
                        <tr>
                            <td><?php print $i++ ?></td>
                            <td><?= $row->jenis_barang ?></td>
                            <td>
                                <a href="<?= base_url() ?>petugas/getHapusjenis/<?= $row->id_jenis ?>" class="badge badge-pill red lighten-1 hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
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

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('petugas/tambah_jenis') ?>" method="POST">
                                <div class="form-group">
                                    <input type="text" name="jenis" class="form-control" placeholder="jenis barang" required>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>