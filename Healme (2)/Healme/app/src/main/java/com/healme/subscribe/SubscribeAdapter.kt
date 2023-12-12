package com.healme.subscribe

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView.Adapter
import androidx.recyclerview.widget.RecyclerView.ViewHolder
import com.healme.R

class SubscribeAdapter: Adapter<SubscribeAdapter.SubscribeHolder>() {
    var data: ArrayList<Subscribe.Data> = ArrayList()
    var subscribeClick: SubscribeClick? = null

    fun Update(data: ArrayList<Subscribe.Data>){
        this.data = data
        notifyDataSetChanged()
    }

    fun setSubscribesClick(subscribeClick: SubscribeClick){
        this.subscribeClick = subscribeClick
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): SubscribeHolder {
        var v = LayoutInflater.from(parent.context).inflate(R.layout.item_subscribe, parent, false)
        return SubscribeHolder(v)
    }

    override fun onBindViewHolder(holder: SubscribeHolder, position: Int) {
        var item = data[position]
        holder.name.text = item.name
        holder.price.text = "Rp ${item.price}"
        holder.discon.text = "DISKON ${item.discon}%"
        holder.time.text = "Paket ${item.time} Bulan"

        if(item.isPay == null || item.isPay == "-1"){
            holder.buy.visibility = View.VISIBLE
        }else{
            holder.buy.visibility = View.INVISIBLE
        }

        if(subscribeClick != null){
            holder.buy.setOnClickListener {
                subscribeClick!!.onBuy(item, position)
            }
        }
    }

    override fun getItemCount(): Int = data.size

    class SubscribeHolder(v: View): ViewHolder(v){
        var name: TextView = v.findViewById(R.id.tv_name_itemsubscribe)
        var price: TextView = v.findViewById(R.id.tv_price_itemsubscribe)
        var discon: TextView = v.findViewById(R.id.tv_discon_itemsubscribe)
        var time: TextView = v.findViewById(R.id.tv_time_itemsubscribe)
        var buy: Button = v.findViewById(R.id.btn_subscribe)
    }

    interface SubscribeClick{
        fun onBuy(data: Subscribe.Data, position: Int)
    }

}