<?php

class Mtrxobat extends CI_Model
{

    protected $table = 'item_transaction_obat';

    function get($where = null)
    {
        if ($where === null) {
            // return $this->db
            //     ->select('transaction.id as trxID,transaction.*, users.*, item_transaction_obat.*')
            //     ->join('transaction', 'transaction.id=item_transaction_obat.trx_id')
            //     ->join('users', 'users.id=transaction.user_id')
            //     ->group_by('transaction.id')
            //     ->get($this->table);

            return $this->db
                ->join('obat', 'obat.id=item_transaction_obat.obat_id')
                ->get($this->table);
        } else {
            // return $this->db
            //     ->select('transaction.id as trxID,transaction.*, users.*, item_transaction_obat.*')
            //     ->join('transaction', 'transaction.id=item_transaction_obat.trx_id')
            //     ->join('users', 'users.id=transaction.user_id')
            //     ->group_by('transaction.id')
            //     ->get_where($this->table, $where);
            return $this->db
                ->join('obat', 'obat.id=item_transaction_obat.obat_id')
                ->get_where($this->table, $where);
        }
    }

    function getItem($trx_id)
    {
        return $this->db
            ->select('item_transaction_obat.*, obat.name as obatName')
            ->join('obat', 'obat.id=item_transaction_obat.obat_id')
            ->get_where($this->table, ['trx_id' => $trx_id]);
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
