<?php

class Chat extends CI_Controller
{

    protected $sesi;

    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'Mtrxchat' => 'm',
            'Mtransaction' => 't'
        ]);
        $this->sesi = $this->session->userdata('login_admin');
    }


    public function index()
    {
        $v['data'] = $this->m->get()->result();
        view('transaksi.chat.index', $v);
    }

    public function detail($id)
    {
        $v['data'] = $this->m->get(['transaction.id' => $id])->row();
        view('transaksi.chat.detail', $v);
    }

    public function status($id)
    {
        $this->t->update(['status' => $this->input->post('status')], ['id' => $id]);
        redirect(base_url() . 'transaksi/chat');
    }


    public function delete($id)
    {
        $this->t->delete(['id' => $id]);
        redirect(base_url() . 'transaksi/chat');
    }
}
