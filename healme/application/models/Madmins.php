<?php

class Madmins extends CI_Model{

    protected $table = 'admins';

    function get($where = null){
        if($where === null){
            return $this->db->get($this->table);
        }else{
            return $this->db->get_where($this->table, $where);
        }
    }

    function add($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function update($data, $where){
        $this->db->update($this->table, $data, $where);
    }

    function delete($where){
        $this->db->delete($this->table, $where);
    }
}