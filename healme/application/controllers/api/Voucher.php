<?php

class Voucher extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Mvoucher' => 'm',
            'Mtransaction' => 't',
            'Mtrxvoc' => 'tv'
        ]);
    }

    public function index()
    {
        $data = $this->m->get();
        if ($data->num_rows() > 0) {
            $r['status'] = 200;
            $datas = [];
            foreach ($data->result() as $item) {
                if (isset($_GET['user'])) {
                    $item->isPay = $this->t->isVocPay($_GET['user'], $item->id);
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

        $data->code = 'VOC-' . strtoupper(uniqid());
        $data->type = 'voucher';
        $data->status = '0';

        $trx_id = $this->t->add($data);

        $item->trx_id = $trx_id;
        $item->expired_at =  date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . '+' . $item->expired_at . ' months'));
        $this->tv->add($item);

        $this->toJSON([
            'status' => 200,
            'msg' => 'Transaksi Sukses',
            'data' => null
        ]);
    }
}
