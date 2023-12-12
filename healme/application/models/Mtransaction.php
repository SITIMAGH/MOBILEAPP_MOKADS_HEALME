<?php

class Mtransaction extends CI_Model
{

    protected $table = 'transaction';

    function get($where = null)
    {
        if ($where === null) {
            return $this->db
                ->select('transaction.id as trxID, transaction.*, users.*')
                ->join('users', 'users.id=transaction.user_id')
                ->get($this->table);
        } else {
            return $this->db
                ->select('transaction.id as trxID, transaction.*, users.*')
                ->join('users', 'users.id=transaction.user_id')
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

    function isChatPay($userId, $dokterId)
    {
        $data = $this->db
            ->join('item_transaction_chat', 'transaction.id=item_transaction_chat.trx_id', 'inner')
            ->order_by('transaction.id', 'desc')
            ->limit('1')
            ->get_where($this->table, ['user_id' => $userId, 'dokter_id' => $dokterId, 'type' => 'chat', 'status !=' => '-1'])
            ->row();

        return $data ? $data->status : null;
    }

    function isVocPay($userId, $vocId)
    {
        $data = $this->db
            ->join('item_transaction_voucher', 'transaction.id=item_transaction_voucher.trx_id', 'inner')
            ->order_by('transaction.id', 'desc')
            ->limit('1')
            ->get_where($this->table, ['user_id' => $userId, 'voucher_id' => $vocId, 'type' => 'voucher', 'status !=' => '-1', 'expired_at >' => date('Y-m-d H:i:s')])
            ->row();

        return $data ? $data->status : null;
    }
}
