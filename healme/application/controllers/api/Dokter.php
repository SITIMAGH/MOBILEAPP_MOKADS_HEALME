<?php

class Dokter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Musers' => 'm',
            'Mtransaction' => 't',
            'Mtrxchat' => 'tc'
        ]);
    }

    public function index()
    {
        $data = $this->m->get(['role' => 'dokter']);
        if ($data->num_rows() > 0) {
            $r['status'] = 200;
            $datas = [];
            foreach ($data->result() as $item) {
                if (isset($_GET['user'])) {
                    $item->isPay = $this->t->isChatPay($_GET['user'], $item->id);
                } else {
                    $item->isPay = null;
                }
                $datas[] = $item;
            }
            $r['data'] = $datas;
        } else {
            $r['status'] = 404;
            $r['data'] = [];
        }

        $this->toJSON($r);
    }

    public function buy()
    {
        $data = json_decode(file_get_contents('php://input'));
        $item = $data->detail;
        unset($data->detail);

        $data->code = 'CHAT-' . strtoupper(uniqid());
        $data->type = 'chat';
        $data->status = '0';

        $trx_id = $this->t->add($data);

        $item->trx_id = $trx_id;
        $this->tc->add($item);

        $this->toJSON([
            'status' => 200,
            'msg' => 'Transaksi Sukses',
            'data' => null
        ]);
    }
}
