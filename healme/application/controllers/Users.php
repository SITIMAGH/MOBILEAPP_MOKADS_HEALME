<?php

class Users extends CI_Controller
{

    protected $sesi;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Musers', 'm');
        $this->sesi = $this->session->userdata('login_admin');
    }


    public function index()
    {
        $v['data'] = $this->m->get(['role' => 'user'])->result();
        view('users.index', $v);
    }

    public function add()
    {
        view('users.add');
    }

    public function store()
    {
        $data = array_merge(
            $this->input->post(),
            [
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'user'
            ]
        );

        $this->m->add($data);
        redirect(base_url() . 'users');
    }

    public function edit($id)
    {
        $v['data'] = $this->m->get(['id' => $id])->row();
        view('users.edit', $v);
    }

    public function update($id)
    {
        $data = $this->input->post();
        if ($data['password'] != '') {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['password']);
        }

        $this->m->update($data, ['id' => $id]);
        redirect(base_url() . 'users');
    }

    public function delete($id)
    {
        $this->m->delete(['id' => $id]);
        redirect(base_url() . 'users');
    }
}
