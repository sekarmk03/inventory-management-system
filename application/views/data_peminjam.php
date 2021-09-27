<div class="col-6 mt-3">
    <div class="card border-info">
        <div class="card-header bg-info text-white">
            Daftar Peminjam
            <button type="button" href="" class="btn border-primary bg-light ml-2" data-toggle="modal" data-target="#tambah">&plus;</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>NAMA</th>
                        <th>NIS</th>
                        <th>KELAS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($peminjam as $row) {
                    ?>
                        <tr>
                            <td><?php print $i++ ?></td>
                            <td><?= $row->nama_peminjam ?></td>
                            <td><?= $row->nis ?></td>
                            <td><?= $row->kelas ?></td>
                            <td>
                                <a href="<?= base_url() ?>petugas/getHapuspeminjam/<?= $row->id_peminjam ?>" class="badge badge-pill red lighten-1 hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
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

<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-info">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peminjam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <div class="card border-info">
                        <div class="card-body">
                            <form action="<?= base_url('petugas/data_peminjam') ?>" method="POST">
                                <div class="form-group">
                                    <input type="text" name="nama_peminjam" class="form-control" placeholder="masukkan nama" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="nis" class="form-control" placeholder="masukkan nis" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="kelas" class="form-control" placeholder="masukkan kelas" required>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-info">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>