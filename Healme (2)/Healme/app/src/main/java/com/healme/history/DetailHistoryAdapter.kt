package com.healme.history

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView.Adapter
import androidx.recyclerview.widget.RecyclerView.ViewHolder
import com.healme.R

class DetailHistoryAdapter: Adapter<DetailHistoryAdapter.DetailHistoryHolder>() {
    var data: DetailTransaction? = null

    fun Update(data: DetailTransaction){
        this.data = data
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): DetailHistoryHolder {
        var v = LayoutInflater.from(parent.context).inflate(R.layout.item_detailtransaction, parent, false)
        return DetailHistoryHolder(v)
    }

    override fun onBindViewHolder(holder: DetailHistoryHolder, position: Int) {
        var trx = data!!.data

        when(trx.type){
            "chat" -> {
                var chat = data!!.chat[position]
                holder.content.text = "${chat.dokterName} (${chat.price}) x 1"
            }
            "obat" -> {
                var obat = data!!.obat[position]
                holder.content.text = "${obat.name} (${obat.price}) x ${obat.qty}"
            }
            "voucher" -> {
                var voucher = data!!.voucher[position]
                holder.content.text = "${voucher.vocName} (${voucher.price}) x 1"
            }
        }
    }

    override fun getItemCount(): Int = checkSize()

    class DetailHistoryHolder(v: View) : ViewHolder(v){
        var content: TextView = v.findViewById(R.id.tv_detail_itemdetailtransaction)
    }

    fun checkSize(): Int{
        return if(data != null && data!!.data.type == "chat"){
            data!!.chat.size
        }else if(data != null && data!!.data.type == "obat"){
            data!!.obat.size
        }else if(data != null && data!!.data.type == "voucher") {
            data!!.voucher.size
        }else{
            0
        }
    }

}