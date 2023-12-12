<?php

class Voucher extends CI_Controller
{

    protected $sesi;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mvoucher', 'm');
        $this->sesi = $this->session->userdata('login_admin');
    }


    public function index()
    {
        $v['data'] = $this->m->get()->result();
        view('voucher.index', $v);
    }

    public function add()
    {
        view('voucher.add');
    }

    public function store()
    {
        $data = $this->input->post();
        
        $this->m->add($data);
        redirect(base_url() . 'voucher');
    }

    public function edit($id)
    {
        $v['data'] = $this->m->get(['id' => $id])->row();
        view('voucher.edit', $v);
    }

    public function update($id)
    {
        $data = $this->input->post();

        $this->m->update($data, ['id' => $id]);
        redirect(base_url() . 'voucher');
    }

    public function delete($id)
    {
        $this->m->delete(['id' => $id]);
        redirect(base_url() . 'voucher');
    }
}
