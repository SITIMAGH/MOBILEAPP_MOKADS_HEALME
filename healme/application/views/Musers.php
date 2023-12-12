<?php

class Musers extends CI_Model{

    protected $table = 'users';

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

    function isPay($userId, $dokterId){
        return $this->db
        ->join('item_transaction_chat', 'transaction.id=item_transaction_chat.trx_id', 'inner')
        ->get_where('transaction', ['user_id' => $userId, 'dokter_id' => $dokterId, 'type' => 'chat'])
        ->row();
    }
}