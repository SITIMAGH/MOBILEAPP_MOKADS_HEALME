package com.healme.chat

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
import com.healme.janji.Dokter
import com.healme.utils.ServerApp

class ChatAdapter: Adapter<ChatAdapter.ChatHolder>() {
    var data: ArrayList<Dokter.Data> = ArrayList()
    lateinit var context: Context
    var chatClick : ChatClick? = null

    fun Update(data: ArrayList<Dokter.Data>){
        this.data = data
        notifyDataSetChanged()
    }

    fun setChatsClick(chatClick : ChatClick){
        this.chatClick = chatClick
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): ChatHolder {
        context = parent.context
        val v = LayoutInflater.from(context).inflate(R.layout.item_chat, parent, false)
        return ChatHolder(v)
    }

    override fun onBindViewHolder(holder: ChatHolder, position: Int) {
        val item = data[position]
        holder.name.text = item.name
        holder.title.text = item.title
        holder.age.text = "${item.age} Tahun"
        holder.price.text = "Rp ${item.price}"
        Glide.with(context).load("${ServerApp.baseURL}files/${item.image}").into(holder.img)

        when(item.isPay){
            "0" -> {
              holder.btn.visibility = View.INVISIBLE
            }
            "1" -> {
                if(chatClick != null){
                    holder.btn.setOnClickListener {
                        chatClick!!.onChat(item, position)
                    }
                }
                holder.btn.visibility = View.VISIBLE
                holder.btn.text = "CHAT"
            }
            else -> {
                if(chatClick != null){
                    holder.btn.setOnClickListener {
                        chatClick!!.onBuy(item, position)
                    }
                }
                holder.btn.visibility = View.VISIBLE
                holder.btn.text = "BELI"
            }
        }

    }

    override fun getItemCount(): Int = data.size

    class ChatHolder(v: View) : ViewHolder(v){
        val name: TextView = v.findViewById(R.id.tv_name_itemchat)
        val title: TextView = v.findViewById(R.id.tv_title_itemchat)
        val age: TextView = v.findViewById(R.id.tv_age_itemchat)
        val price: TextView = v.findViewById(R.id.tv_price_itemchat)
        val btn: Button = v.findViewById(R.id.btn_chat)
        val img: ImageView = v.findViewById(R.id.iv_profile_itemchat)
    }

    interface ChatClick{
        fun onBuy(data: Dokter.Data, position: Int)
        fun onChat(data: Dokter.Data, position: Int)
    }
}