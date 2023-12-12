<?php

class Mtrxchat extends CI_Model
{

    protected $table = 'item_transaction_chat';

    function get($where = null)
    {
        if ($where === null) {
            return $this->db
                ->select('
                    transaction.id as trxId,
                    item_transaction_chat.id as trxchatId,
                    transaction.*, 
                    item_transaction_chat.*,
                    (SELECT name FROM users WHERE id=transaction.user_id AND role="user") as userName,
                    (SELECT name FROM users WHERE id=item_transaction_chat.dokter_id AND role="dokter") as dokterName,
                ')
                ->join('transaction', 'transaction.id=item_transaction_chat.trx_id', 'inner')
                ->get($this->table);
        } else {
            return $this->db
                ->select('
                    transaction.id as trxId,
                    item_transaction_chat.id as trxchatId,
                    transaction.*, 
                    item_transaction_chat.*,
                    (SELECT name FROM users WHERE id=transaction.user_id AND role="user") as userName,
                    (SELECT name FROM users WHERE id=item_transaction_chat.dokter_id AND role="dokter") as dokterName,
                ')
                ->join('transaction', 'transaction.id=item_transaction_chat.trx_id', 'inner')
                ->get_where($this->table, $where);
        }
    }

    function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function update($data, $where)
    {
        $this->db->update($this->table, $data, $where);
    }

    function delete($where)
    {
        $this->db->delete($this->table, $where);
    }
}
