<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect(base_url('petugas'));
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login!';
            $this->load->view('templates/header', $data);
            $this->load->view('login');
            $this->load->view('templates/footer');
        } else {
            $this->_Login();
        }
    }

    private function _Login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $petugas = $this->db->get_where('petugas', ['username' => $username])->row_array();
        if (md5($password, $petugas['password'])) {
            $data = [
                'id_petugas' => $petugas['id_petugas'],
                'username' => $petugas['username']
            ];
            $this->session->set_userdata($data);
            redirect('petugas');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username or Password are incorrect !</div>');
            redirect(base_url('login'));
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You had been logout!</div>');
        redirect(base_url());
    }
}
