package com.healme.obat

import android.content.Context
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import android.widget.ImageView
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView.Adapter
import androidx.recyclerview.widget.RecyclerView.ViewHolder
import com.bumptech.glide.Glide
import com.healme.R
import com.healme.utils.CartStorage
import com.healme.utils.ServerApp

class ObatAdapter: Adapter<ObatAdapter.ObatHolder>() {
    var data: ArrayList<Obat.Data> = ArrayList()
    lateinit var context: Context
    var obatClick: ObatClick? = null
    lateinit var CARTSTORAGE: CartStorage

    fun Update(data: ArrayList<Obat.Data>){
        this.data = data
        notifyDataSetChanged()
    }

    fun setObatsClick(obatClick: ObatClick){
        this.obatClick = obatClick
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ObatHolder {
        context = parent.context
        CARTSTORAGE = CartStorage(context)
        var v = LayoutInflater.from(context).inflate(R.layout.item_obat, parent, false)
        return ObatHolder(v)
    }

    override fun onBindViewHolder(holder: ObatHolder, position: Int) {
        var item = data[position]
        Glide.with(context).load("${ServerApp.baseURL}files/${item.image}").into(holder.img)
        holder.title.text = item.name
        holder.price.text = "Rp ${item.price}"

        if(CARTSTORAGE.loadById(item.id) != null){
            holder.btn.visibility = View.INVISIBLE
        }else{
            holder.btn.visibility = View.VISIBLE
        }

        if(obatClick != null){
            holder.itemView.setOnClickListener {
                obatClick!!.onDetailObat(item)
            }

            holder.btn.setOnClickListener {
                obatClick!!.onAddCart(item)
            }
        }
    }

    override fun getItemCount(): Int = data.size

    class ObatHolder(v: View) : ViewHolder(v){
        var img: ImageView = v.findViewById(R.id.iv_img_itemobat)
        var title: TextView = v.findViewById(R.id.tv_title_itemobat)
        var price: TextView = v.findViewById(R.id.tv_price_itemobat)
        var btn: Button = v.findViewById(R.id.btn_tambah_itemobat)
    }

    interface ObatClick{
        fun onDetailObat(data: Obat.Data)
        fun onAddCart(data: Obat.Data)
    }
}