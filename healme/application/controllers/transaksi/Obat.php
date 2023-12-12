<?php

class Obat extends CI_Controller
{

    protected $sesi;

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Mtrxobat' => 'm',
            'Mtransaction' => 't'
        ]);
        $this->sesi = $this->session->userdata('login_admin');
    }


    public function index()
    {
        $v['data'] = $this->t->get(['type' => 'obat'])->result();

        view('transaksi.obat.index', $v);
    }

    public function detail($id)
    {
        $v['trx'] = $this->t->get(['transaction.id' => $id])->row();
        $v['data'] = $this->m->get(['trx_id' => $id])->result();
        view('transaksi.obat.detail', $v);
    }

    public function status($id)
    {
        $this->t->update(['status' => $this->input->post('status')], ['id' => $id]);
        redirect(base_url() . 'transaksi/obat');
    }


    public function delete($id)
    {
        $this->t->delete(['id' => $id]);
        redirect(base_url() . 'transaksi/obat');
    }
}
