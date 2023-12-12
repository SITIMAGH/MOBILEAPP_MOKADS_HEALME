<?php

class Obat extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Mobat' => 'm',
            'Mtrxobat' => 'to',
            'Mtransaction' => 't'
        ]);
    }

    public function index()
    {
        $data = $this->m->get();
        if ($data->num_rows() > 0) {
            $r['status'] = 200;
            $r['data'] = $data->result();
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

        $data->code = 'OBAT-' . strtoupper(uniqid());
        $data->type = 'obat';
        $data->status = '0';

        $trx_id = $this->t->add($data);

        foreach ($item as $item2) {
            $item2->trx_id = $trx_id;
            $this->to->add($item2);
        }

        $this->toJSON([
            'status' => 200,
            'msg' => 'Transaksi Sukses',
            'data' => null
        ]);
    }
}
