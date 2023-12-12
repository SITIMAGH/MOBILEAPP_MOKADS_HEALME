<?php

if (!function_exists('model')) {
    function model($name)
    {
        $CI = &get_instance();
        $CI->load->model($name);
        return $CI->$name;
    }
}

if (!function_exists('userActive')) {
    function userActive()
    {
        $CI = &get_instance();
        $CI->load->model('Musers', 'u');

        $userLogin = $CI->session->userdata('login');
        $u = $CI->u->get(['id' => $userLogin->id]);
        if ($u->num_rows() > 0 && $u->row()->active == '1') {
            return true;
        } else {
            return false;
        }
    }
}
