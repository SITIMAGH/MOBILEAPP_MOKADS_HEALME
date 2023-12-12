package com.healme.history

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView.Adapter
import androidx.recyclerview.widget.RecyclerView.ViewHolder
import com.healme.R

class HistoryAdapter: Adapter<HistoryAdapter.HistoryHolder>() {
    var data: ArrayList<History.Data> = ArrayList()
    var historyClick: HistoryClick? = null

    fun Update(data: ArrayList<History.Data>){
        this.data = data
        notifyDataSetChanged()
    }

    fun setHistorysClick(historyClick: HistoryClick){
        this.historyClick = historyClick
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): HistoryHolder {
        var v = LayoutInflater.from(parent.context).inflate(R.layout.item_history, parent, false)
        return HistoryHolder(v)
    }

    override fun onBindViewHolder(holder: HistoryHolder, position: Int) {
        val status = HashMap<String, String>()
        status["0"] = "Pending"
        status["1"] = "Disetujui"
        status["-1"] = "Dibatalkan"

        var item = data[position]
        holder.trx.text = "#${item.code}"
        holder.price.text = "Rp ${item.total}"
        holder.date.text = item.created_at
        holder.status.text = status[item.status]

        if(historyClick != null){
            holder.itemView.setOnClickListener {
                historyClick!!.onDetail(item)
            }
        }
    }

    override fun getItemCount(): Int = data.size

    class HistoryHolder(v: View): ViewHolder(v) {
        var trx: TextView = v.findViewById(R.id.tv_trx_itemhistory)
        var price: TextView = v.findViewById(R.id.tv_price_itemhistory)
        var date: TextView = v.findViewById(R.id.tv_date_itemhistory)
        var status: TextView = v.findViewById(R.id.tv_status_itemhistory)
    }

    interface HistoryClick{
        fun onDetail(data: History.Data)
    }
}