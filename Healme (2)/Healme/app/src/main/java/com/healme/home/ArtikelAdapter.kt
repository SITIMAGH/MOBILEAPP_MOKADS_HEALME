package com.healme.home

import android.content.Context
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView.Adapter
import androidx.recyclerview.widget.RecyclerView.ViewHolder
import com.bumptech.glide.Glide
import com.healme.R
import com.healme.utils.ServerApp

class ArtikelAdapter: Adapter<ArtikelAdapter.ArtikelHolder>() {
    var data: ArrayList<Artikel.Data> = ArrayList()
    lateinit var context: Context
    var artikelClick: ArtikelClick? = null

    fun Update(data: ArrayList<Artikel.Data>){
        this.data = data
        notifyDataSetChanged()
    }

    fun setArticleClick(artikelClick: ArtikelClick){
        this.artikelClick = artikelClick
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ArtikelHolder {
        context = parent.context
        var v = LayoutInflater.from(context).inflate(R.layout.item_artikel, parent, false)
        return ArtikelHolder(v)
    }

    override fun onBindViewHolder(holder: ArtikelHolder, position: Int) {
        Glide.with(context).load("${ServerApp.baseURL}files/${data[position].image}").into(holder.img)
        holder.title.text = data[position].title
        if(artikelClick != null){
            holder.itemView.setOnClickListener {
                artikelClick!!.onDetailArtikel(data = data[position])
            }
        }
    }

    override fun getItemCount(): Int = data.size

    class ArtikelHolder(v: View): ViewHolder(v){
        var img: ImageView = v.findViewById(R.id.iv_img_itemartikel)
        var title: TextView = v.findViewById(R.id.tv_title_itemartikel)
    }

    interface ArtikelClick{
        fun onDetailArtikel(data: Artikel.Data)
    }
}