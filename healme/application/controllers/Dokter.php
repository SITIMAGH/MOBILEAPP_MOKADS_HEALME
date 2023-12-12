<?php

class Dokter extends CI_Controller
{

    protected $sesi;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Musers', 'm');

        $config['upload_path'] = 'files/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 20000;
        $config['file_name'] = uniqid();
        $this->load->library('upload', $config);

        $this->sesi = $this->session->userdata('login_admin');
    }


    public function index()
    {
        $v['data'] = $this->m->get(['role' => 'dokter'])->result();
        view('dokter.index', $v);
    }

    public function add()
    {
        view('dokter.add');
    }

    public function store()
    {
        $data = array_merge(
            $this->input->post(),
            [
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'dokter'
            ]
        );

        if ($this->upload->do_upload('image')) {
            $data['image'] = $this->upload->data('file_name');
        } else {
            $data['image'] = 'no-image.jpg';
        }

        $this->m->add($data);
        redirect(base_url() . 'dokter');
    }

    public function edit($id)
    {
        $v['data'] = $this->m->get(['id' => $id])->row();
        view('dokter.edit', $v);
    }

    public function update($id)
    {
        $data = $this->input->post();
        if ($data['password'] != '') {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['password']);
        }

        if ($_FILES['image']['name'] != '') {
            if ($this->upload->do_upload('image')) {
                $data['image'] = $this->upload->data('file_name');
            } else {
                $data['image'] = 'no-image.jpg';
            }
        }

        $this->m->update($data, ['id' => $id]);
        redirect(base_url() . 'dokter');
    }

    public function delete($id)
    {
        $data = $this->m->get(['id' => $id])->row();
        if ($data->image != '' && file_exists('files/' . $data->image)) {
            unlink('files/' . $data->image);
        }

        $this->m->delete(['id' => $id]);
        redirect(base_url() . 'dokter');
    }
}
