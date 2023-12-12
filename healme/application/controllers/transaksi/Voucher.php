<?php

class Voucher extends CI_Controller
{

    protected $sesi;

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Mtrxvoc' => 'm',
            'Mtransaction' => 't'
        ]);
        $this->sesi = $this->session->userdata('login_admin');
    }


    public function index()
    {
        $v['data'] = $this->m->get()->result();
        view('transaksi.voucher.index', $v);
    }

    public function detail($id)
    {
        $v['data'] = $this->m->get(['transaction.id' => $id])->row();
        view('transaksi.voucher.detail', $v);
    }

    public function status($id)
    {
        $this->t->update(['status' => $this->input->post('status')], ['id' => $id]);
        redirect(base_url() . 'transaksi/voucher');
    }


    public function delete($id)
    {
        $this->t->delete(['id' => $id]);
        redirect(base_url() . 'transaksi/voucher');
    }
}
