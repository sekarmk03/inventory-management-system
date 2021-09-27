<div class="col-9 mt-3">
    <div class="card border-info">
        <div class="card-header">
            Transaksi Pengembalian
            <a href="" class="btn btn-info" data-toggle="modal" data-target="#tambah">Tambah Transaksi</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center table-responsive">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>NAMA</th>
                        <th>TGL.PENGEMBALIAN</th>
                    </tr>
                </thead>
                <?php
                $query = "
                            select a.nama_peminjam, b.*, c.nama_barang from peminjam a
                            inner join transaksi_pinjam b on a.id_peminjam=b.id_peminjam
                            inner join inventaris c on b.id_inventaris=c.id_inventaris
                        ";
                $pengembalian = $this->db->query($query)->result_array();
                ?>
                <?php
                $i = 1;
                foreach ($pengembalian as $row) {
                ?>
                    <tbody>
                        <tr>
                            <td><?php print $i++ ?></td>
                            <td><?php print $row['nama_peminjam'] ?></td>
                            <td><?php print $row['tanggal_kembali'] ?></td>
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
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Registrasi Pengembalian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php base_url('petugas/pengembalian') ?>" method="POST">
                                <div class="form-group">
                                    <select name="nis" class="form-control">
                                        <option disabled selected>- Pilih NIS Peminjam -</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="barang" class="form-control">
                                        <option disabled selected>- Pilih Barang -</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-info">Perbarui</button>
            </div>
            </form>
        </div>
    </div>
</div>