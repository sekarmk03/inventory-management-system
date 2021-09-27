<div class="col-9 mt-3">
    <div class="card border-info">
        <div class="card-header bg-info text-white">
            Transaksi Peminjaman
            <button type="button" href="" class="btn border-primary bg-light ml-2 " data-toggle="modal" data-target="#pinjam"> &plus; </button>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center table-responsive">
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>NAMA</th>
                        <th>BARANG</th>
                        <th>JUMLAH</th>
                        <th>TGL.PINJAM</th>
                        <th>KEPERLUAN</th>
                        <th>TGL.KEMBALI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "
                            select a.nama_peminjam, b.id_peminjaman, b.jumlah, b.tanggal_pinjam, b.keperluan, b.tanggal_kembali, c.nama_barang , d.* from peminjam a
                            inner join transaksi_pinjam b on a.id_peminjam=b.id_peminjam
                            inner join inventaris c on b.id_inventaris=c.id_inventaris
                            inner join petugas d on c.id_petugas=d.id_petugas
                        ";
                    $data_peminjam = $this->db->query($query)->result_array();
                    ?>
                    <?php
                    $i = 1;
                    foreach ($data_peminjam as $row) {
                    ?>
                        <tr>
                            <td><?php print $i++ ?></td>
                            <td><?php print $row['nama_peminjam'] ?></td>
                            <td><?php print $row['nama_barang'] ?></td>
                            <td><?php print $row['jumlah'] ?></td>
                            <td><?php print $row['tanggal_pinjam'] ?></td>
                            <td><?php print $row['keperluan'] ?></td>
                            <td><?php print $row['tanggal_kembali'] ?></td>
                            <td>
                                <?php if ($row['tanggal_kembali'] == NULL) : ?>
                                    <a href="<?= base_url() ?>petugas/pengembalian/<?= $row['id_peminjaman'] ?>" class="btn border-primary bg-light ml-2"> &check; </a>
                                <?php else : ?>
                                    &check;
                                <?php endif; ?>
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

<!--Ini modal-->

<!-- Modal -->
<div class="modal fade" id="pinjam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-info">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Transaksi Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col">
                    <div class="card border-info">
                        <div class="card-body">
                            <form action="<?= base_url('petugas/peminjaman') ?>" method="POST">
                                <div class="form-group">
                                    <select name="id_peminjam" class="form-control">
                                        <option disabled selected>- Pilih Peminjam -</option>
                                        <?php foreach ($peminjam as $row) { ?>
                                            <option value="<?= $row->id_peminjam ?>"><?= $row->nama_peminjam ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="id_inventaris" class="form-control">
                                        <option disabled selected>- Pilih Barang -</option>
                                        <?php foreach ($barang as $row) { ?>
                                            <option value="<?= $row->id_inventaris ?>"><?= $row->nama_barang ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="jumlah" class="form-control" placeholder="Masukkan jumlah barang" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="keperluan" id="keperluan" cols="51" rows="4" placeholder="keperluan peminjaman"></textarea>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-info">Transaksi</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="kembali" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Transaksi Pengembalian</h5>
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
                                    <select name="id_peminjam" class="form-control">
                                        <option disabled selected>- Pilih Peminjam -</option>
                                        <?php foreach ($peminjam as $row) { ?>
                                            <option value="<?= $row->id_peminjam ?>"><?= $row->nama_peminjam ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="id_inventaris" class="form-control">
                                        <option disabled selected>- Pilih Barang -</option>
                                        <?php foreach ($barang as $row) { ?>
                                            <option value="<?= $row->id_inventaris ?>"><?= $row->nama_barang ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-info">Selesai</button>
                </div>
                </form>
            </div>
        </div>
    </div>