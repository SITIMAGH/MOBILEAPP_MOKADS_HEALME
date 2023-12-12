package com.healme.janji

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

class DokterAdapter: Adapter<DokterAdapter.DokterHolder>() {

    var data: ArrayList<Dokter.Data> = ArrayList()
    lateinit var context: Context

    public fun Update(data: ArrayList<Dokter.Data>){
        this.data = data
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): DokterHolder {
        context = parent.context
        var v = LayoutInflater.from(context).inflate(R.layout.item_dokter, parent, false)
        return DokterHolder(v)
    }

    override fun onBindViewHolder(holder: DokterHolder, position: Int) {
        var item = data[position]
        holder.name.text = item.name
        holder.title.text = item.title
        Glide.with(context).load("${ServerApp.baseURL}files/${item.image}").into(holder.profile)
    }

    override fun getItemCount(): Int = data.size

    class DokterHolder(v: View): ViewHolder(v){
        var name: TextView = v.findViewById(R.id.tv_name_itemdokter)
        var title: TextView = v.findViewById(R.id.tv_title_itemdokter)
        var profile: ImageView = v.findViewById(R.id.iv_profile_itemdokter)
    }
}