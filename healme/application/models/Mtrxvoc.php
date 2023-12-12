<?php

class Mtrxvoc extends CI_Model
{

    protected $table = 'item_transaction_voucher';

    function get($where = null)
    {
        if ($where === null) {
            return $this->db
                ->select('
                transaction.id as trxId, 
                item_transaction_voucher.id as  trxvocId,
                users.name as userName, 
                voucher.name as vocName,
                transaction.*, 
                item_transaction_voucher.*,
                users.*,
                voucher.*
                ')
                ->join('transaction', 'transaction.id=item_transaction_voucher.trx_id', 'left')
                ->join('users', 'transaction.user_id=users.id')
                ->join('voucher', 'item_transaction_voucher.id=voucher.id')
                ->get($this->table);
        } else {
            return $this->db
                ->select('
                transaction.id as trxId, 
                item_transaction_voucher.id as  trxvocId,
                users.name as userName, 
                voucher.name as vocName,
                transaction.*, 
                item_transaction_voucher.*,
                users.*,
                voucher.*
                ')
                ->join('transaction', 'transaction.id=item_transaction_voucher.trx_id', 'left')
                ->join('users', 'transaction.user_id=users.id')
                ->join('voucher', 'item_transaction_voucher.id=voucher.id')
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
