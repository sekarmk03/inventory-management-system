        <div class="col-9 mt-3">
            <div class="card border-info">
                <div class="card-header bg-info text-white">
                    Data Inventaris
                    <button type="button" href="" class="btn border-primary bg-light ml-2" data-toggle="modal" data-target="#tambah">&plus;</button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center table-responsive">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>JENIS</th>
                                <th>NAMA</th>
                                <th>KONDISI</th>
                                <th>STOK</th>
                                <th>TGL.MASUK</th>
                                <th>KET.DANA</th>
                                <th>PETUGAS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "
                            select a.*, b.nama_petugas, c.jenis_barang from inventaris a
                            inner join petugas b on a.id_petugas=b.id_petugas
                            inner join barang c on a.id_jenis=c.id_jenis
                        ";
                            $data_peminjam = $this->db->query($query)->result_array();
                            ?>
                            <?php
                            $i = 1;
                            foreach ($data_peminjam as $row) :
                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row['jenis_barang'] ?></td>
                                    <td><?= $row['nama_barang'] ?></td>
                                    <td><?= $row['kondisi'] ?></td>
                                    <td><?= $row['jumlah'] ?></td>
                                    <td><?= $row['tanggal_masuk'] ?></td>
                                    <td><?= $row['sumber_dana'] ?></td>
                                    <td><?= $row['nama_petugas'] ?></td>
                                    <td>
                                        <a href="<?= base_url() ?>petugas/getubah" class="badge badge-pill green lighten-1 ubahModal" data-toggle="modal" data-target="#UbahModal" data-id="<?= $row['id_inventaris'] ?>">Ubah</a>
                                        <a href="<?= base_url() ?>petugas/getHapus/<?= $row['id_inventaris'] ?>" class="badge badge-pill red lighten-1 hapus" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pemasukan Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <div class="card border-info">
                                <div class="card-body">
                                    <form action="<?= base_url('petugas/tambah_inventaris') ?>" method="POST">
                                        <div class="form-group">
                                            <select name="jenis_barang" class="form-control">
                                                <option disabled selected>- pilih jenis barang -</option>
                                                <?php foreach ($id_jenis as $row) { ?>
                                                    <option value="<?= $row->id_jenis ?>"><?= $row->jenis_barang ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nama" class="form-control" placeholder="nama barang" required>
                                        </div>
                                        <div class="form-group">
                                            <select name="kondisi" class="form-control">
                                                <option disabled selected>- pilih kondisi barang -</option>
                                                <option value="baru">Baru</option>
                                                <option value="bekas">Bekas</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="jumlah" class="form-control" placeholder="jumlah barang" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="dana" id="dana" cols="51" rows="3" placeholder="Keterangan sumber dana.."></textarea>
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

        <!-- Modal Ubah -->
        <div class="modal fade" id="UbahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content border-info">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <div class="card border-info">
                                <div class="card-body">
                                    <form action="<?= base_url('petugas/tambah_inventaris') ?>" method="POST">
                                        <div class="form-group">
                                            <select id="jenis_barang" name="jenis_barang" class="form-control">
                                                <option disabled selected>- pilih jenis barang -</option>
                                                <?php foreach ($id_jenis as $row) { ?>
                                                    <option value="<?= $row->id_jenis ?>"><?= $row->jenis_barang ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="nama" name="nama" class="form-control" placeholder="nama barang" required>
                                        </div>
                                        <div class="form-group">
                                            <select id="kondisi" name="kondisi" class="form-control">
                                                <option disabled selected>- pilih kondisi barang -</option>
                                                <option value="baru">Baru</option>
                                                <option value="bekas">Bekas</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" id="jumlah" name="jumlah" class="form-control" placeholder="jumlah barang" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="dana" id="dana" rows="3" placeholder="Keterangan sumber dana.."></textarea>
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

        <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
        <script>
            $(function() {
                $('.ubahModal').on('click', function() {

                    const id = $(this).data('id');
                    $('.modal-body form').attr('action', '<?php echo site_url('petugas/ubahInv/') ?>' + id);

                    $.ajax({
                        url: '<?php echo site_url('petugas/getubah') ?>',
                        data: {
                            'id_inventaris': id
                        },
                        type: 'post',
                        dataType: 'json',
                        success: function(data) {
                            $('#jenis_barang').val(data.id_jenis);
                            $('#nama').val(data.nama_barang);
                            $('#kondisi').val(data.kondisi);
                            $('#jumlah').val(data.jumlah);
                            $('textarea#dana').val(data.sumber_dana);
                        }
                    });
                });
            });
        </script>
        <script>
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            })
        </script>