<?php

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Musers', 'm');
    }

    public function user($id)
    {
        $data = $this->m->get(['id' => $id]);
        if ($data->num_rows() > 0) {
            $r['status'] = 200;
            $r['data'] = $data->row();
        } else {
            $r['status'] = 404;
            $r['data'] = [];
        }

        $this->toJSON($r);
    }

    public function update($id)
    {
        $data = json_decode(file_get_contents('php://input'));
        if($data->password != ''){
            $data->password = password_hash($data->password, PASSWORD_DEFAULT);
        }else{
            unset($data->password);
        }

        $this->m->update($data, ['id' => $id]);

        $this->toJSON([
            'status' => 200,
            'msg' => 'Update Sukses',
            'data' => null
        ]);
    }
}
