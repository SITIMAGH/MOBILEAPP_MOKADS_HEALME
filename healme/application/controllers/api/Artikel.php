<?php

class Artikel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mnews', 'm');
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
}
