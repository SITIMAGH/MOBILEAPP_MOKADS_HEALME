<?php

class Transaction extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Mtransaction' => 'm',
            'Mtrxvoc' => 'tv',
            'Mtrxobat' => 'to',
            'Mtrxchat' => 'tc',
        ]);
    }

    public function user($id)
    {
        $data = $this->m->get(['user_id' => $id]);
        if ($data->num_rows() > 0) {
            $r['status'] = 200;
            $r['data'] = $data->result();
        } else {
            $r['status'] = 404;
            $r['data'] = [];
        }

        $this->toJSON($r);
    }

    public function detail($userId, $id, $type)
    {
        $data = $this->m->get(['transaction.id' => $id, 'type' => $type, 'user_id' => $userId]);
        if ($data->num_rows() > 0) {
            $r['status'] = 200;
            $r['data'] = $data->row();
            $r['chat'] = $this->tc->get(['trx_id' => $id])->result();
            $r['voucher'] = $this->tv->get(['trx_id' => $id])->result();
            $r['obat'] = $this->to->get(['trx_id' => $id])->result();
        } else {
            $r['status'] = 404;
            $r['data'] = [];
            $r['chat'] = [];
            $r['voucher'] = [];
            $r['obat'] = [];
        }

        $this->toJSON($r);
    }

    public function proof($userId, $id, $type)
    {
        $config['upload_path'] = 'files/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 20000;
        $config['file_name'] = uniqid();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $data['proof_img'] = $this->upload->data('file_name');
        } else {
            $data['proof_img'] = 'no-image.jpg';
        }

        $this->m->update($data, ['user_id' => $userId, 'id' => $id, 'type' => $type]);

        $this->toJSON([
            'status' => 200,
            'msg' => 'SUKSES',
            'data' => json_encode($data)
        ]);
    }
}
