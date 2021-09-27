<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Sistem Inventaris';
        $data['inventaris'] = $this->db->get('inventaris')->result();
        $data['id_jenis'] = $this->db->get('barang')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('inventaris', $data);
        $this->load->view('templates/copy-footer');
    }

    public function tambah_inventaris()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tambah_inv = [
            'tanggal_masuk' => date("Y-m-d H:i:s"),
            'id_jenis' => $this->input->post('jenis_barang'),
            'nama_barang' => $this->input->post('nama'),
            'kondisi' => $this->input->post('kondisi'),
            'jumlah' => $this->input->post('jumlah'),
            'sumber_dana' => $this->input->post('dana'),
            'id_petugas' => $this->session->userdata('id_petugas')
        ];
        $this->db->insert('inventaris', $tambah_inv);
        redirect(base_url());
    }

    public function getubah()
    {
        echo json_encode($this->db->get_where('inventaris', ['id_inventaris' => $this->input->post('id_inventaris')])->row_array());
        //echo json_encode($this->db->get_where('barang', ['id_barang' => $this->input->post('id_barang')])->row_array());
    }

    public function ubahInv($id_inventaris = NULL)
    {
        date_default_timezone_set("Asia/Jakarta");
        $ubahinventaris = [
            'tanggal_masuk' => date("Y-m-d H:i:s"),
            'id_jenis' => $this->input->post('jenis_barang'),
            'nama_barang' => $this->input->post('nama'),
            'kondisi' => $this->input->post('kondisi'),
            'jumlah' => $this->input->post('jumlah'),
            'sumber_dana' => $this->input->post('dana'),
            'id_petugas' => $this->session->userdata('id_petugas')
        ];
        $this->db->where('id_inventaris', $id_inventaris);
        $this->db->update('inventaris', $ubahinventaris);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mengubah  data!</div>');
        redirect(base_url(''));
    }

    public function getHapus($id = NULL)
    {
        $this->db->where('id_inventaris', $id);
        $this->db->delete('inventaris');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus data!</div>');
        redirect(base_url(''));
    }

    public function jenis_barang()
    {
        $data['title'] = 'Halaman Daftar Jenis Barang';
        $data['barang'] = $this->db->get('barang')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('data_barang', $data);
        $this->load->view('templates/copy-footer');
    }

    public function tambah_jenis()
    {
        $barang = [
            'jenis_barang' => $this->input->post('jenis')
        ];
        $this->db->insert('barang', $barang);
        redirect(base_url('petugas/jenis_barang'));
    }

    public function getHapusjenis($id = NULL)
    {
        $this->db->where('id_jenis', $id);
        $this->db->delete('barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus data!</div>');
        redirect(base_url('petugas/jenis_barang'));
    }

    public function peminjam()
    {
        $data['title'] = 'Halaman Peminjam';
        $data['peminjam'] = $this->db->get('peminjam')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('data_peminjam', $data);
        $this->load->view('templates/copy-footer');
    }

    public function data_peminjam()
    {
        $peminjam = [
            'nama_peminjam' => $this->input->post('nama_peminjam'),
            'nis' => $this->input->post('nis'),
            'kelas' => $this->input->post('kelas')
        ];
        $this->db->insert('peminjam', $peminjam);
        redirect(base_url('petugas/peminjam'));
    }

    public function getHapuspeminjam($id = NULL)
    {
        $this->db->where('id_peminjam', $id);
        $this->db->delete('peminjam');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus data!</div>');
        redirect(base_url('petugas/peminjam'));
    }

    public function pinjam()
    {
        $data['title'] = 'Halaman transaksi';
        $data['peminjam'] = $this->db->get('peminjam')->result();
        $data['barang'] = $this->db->get('inventaris')->result();
        $data['petugas'] = $this->db->get('petugas')->result();
        $data['transaksi'] = $this->db->get('transaksi_pinjam')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('peminjaman', $data);
        $this->load->view('templates/copy-footer');
    }

    public function peminjaman()
    {
        date_default_timezone_set("Asia/Jakarta");
        $peminjaman = [
            'id_peminjam' => $this->input->post('id_peminjam'),
            'id_inventaris' => $this->input->post('id_inventaris'),
            'id_petugas' => $this->session->userdata('id_petugas'),
            'tanggal_pinjam' => date("Y-m-d H:i:s"),
            'jumlah' => $this->input->post('jumlah'),
            'keperluan' => $this->input->post('keperluan'),
            'tanggal_kembali' => NULL
        ];
        $this->db->insert('transaksi_pinjam', $peminjaman);
        redirect(base_url('petugas/pinjam'));
    }

    public function pengembalian($id = null)
    {
        date_default_timezone_set('asia/jakarta');
        $peminjaman = [
            'tanggal_kembali' => date("Y-m-d H:i:s")
        ];
        $this->db->where('id_peminjaman', $id);
        $this->db->update('transaksi_pinjam', $peminjaman);

        redirect(base_url('petugas/pinjam'));
    }
}
