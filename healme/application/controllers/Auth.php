<?php

class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmins', 'm');
        if ($this->uri->segment(3) != 'logout') {
            if ($this->session->userdata('login_admin') != null) {
                redirect(base_url() );
            }
        }
    }


    public function login()
    {
        view('login');
    }

    public function do_login()
    {
        $valid = $this->m->get(['email' => $this->input->post('email')]);
        if ($valid->num_rows() > 0) {
            $row = $valid->row();
            if (password_verify($this->input->post('password'), $row->password)) {
                $this->session->set_userdata('login_admin', $row);
                redirect(base_url());
            } else {
                echo "Password salah. <a href='" . base_url()  . "auth/login'>Back</a>";
                return;
            }
        } else {
            echo "Akun Belum Terdaftar. <a href='" . base_url()  . "auth/login'>Back</a>";
            return;
        }
    }

    public function logout(){
        $this->session->unset_userdata('login_admin');
        redirect(base_url() . 'auth/login');
    }
}
