<?php

class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Musers', 'm');
    }

    public function login()
    {
        $data = json_decode(file_get_contents('php://input'));

        $valid = $this->m->get(['phone' => $data->phone]);
        if ($valid->num_rows() > 0) {
            $row = $valid->row();
            if (password_verify($data->password, $row->password)) {
                $this->toJSON([
                    'status' => 200,
                    'msg' => 'Login Sukses',
                    'data' => $row
                ]);
            } else {
                $this->toJSON([
                    'status' => 404,
                    'msg' => 'Password Salah',
                    'data' => null
                ]);
            }
        } else {
            $this->toJSON([
                'status' => 404,
                'msg' => 'Akun Tidak Ditemukan',
                'data' => null
            ]);
        }
    }

    public function register()
    {
        $data = json_decode(file_get_contents('php://input'));
        $data->password = password_hash($data->password, PASSWORD_DEFAULT);
        $data->role = 'user';

        $this->m->add($data);

        $this->toJSON([
            'status' => 200,
            'msg' => 'Register Sukses',
            'data' => null
        ]);
    }

    public function logingoogle()
    {
        $data = json_decode(file_get_contents('php://input'));
        $data->role = 'user';

        $valid = $this->m->get(['google_auth' => $data->google_auth]);
        if($valid->num_rows() > 0){
            $this->toJSON([
                'status' => 200,
                'msg' => 'Google Auth Sukses',
                'data' => $valid->row()
            ]);
        }else{
            $id = $this->m->add($data);
            $this->toJSON([
                'status' => 200,
                'msg' => 'Google Auth Sukses',
                'data' => $this->m->get(['id' => $id])->row()
            ]);
        }
    }
}
