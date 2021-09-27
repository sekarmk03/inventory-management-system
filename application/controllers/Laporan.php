<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Laporan extends CI_Controller{
        function __construct()
        {
            parent::__construct();
            $this->load->library('pdf');
        }
        function laporan_inventaris(){
            $pdf = new FPDF('l','mm','A4');
            $pdf->AddPage();
            $pdf->SetFont('Times New Roman','B',16);
            $pdf->Cell(190,7,'LAPORAN INVENTARIS BARANG',0,1,'C');
            $pdf->SetFont('Times New Roman','B',14);
            $pdf->Cell(190,7,'TOOLROOM RPL',0,1,'C');
            $pdf->Cell(10,7,'',0,1);
            $pdf->SetFont('Times New Roman','B',12);
            $inventaris = $this->db->get('inventaris')->result();
            foreach ($inventaris as $row){
                $pdf->Cell(20,6,$row->jumlah,1,0);
            }
            $pdf->Output();
        }
    }
?>