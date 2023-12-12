package com.healme.dokter

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView.Adapter
import androidx.recyclerview.widget.RecyclerView.ViewHolder
import com.healme.R
import com.healme.utils.Session

class DokterChatAdapter: Adapter<DokterChatAdapter.DokterChatHolder>() {
    var data: ArrayList<DokterChat.Data> = ArrayList()
    var dokterChatClick: DokterChatClick? = null
    lateinit var SESSION: Session

    fun Update(data: ArrayList<DokterChat.Data>){
        this.data = data
        notifyDataSetChanged()
    }

    fun setDoktersChatClick(dokterChatClick: DokterChatClick){
        this.dokterChatClick = dokterChatClick
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): DokterChatHolder {
        SESSION = Session(parent.context)
        val v = LayoutInflater.from(parent.context).inflate(R.layout.item_dokterchat, parent, false)
        return DokterChatHolder(v)
    }

    override fun onBindViewHolder(holder: DokterChatHolder, position: Int) {
        val item = data[position]
        holder.name.text = item.user.name

        val chat = item.chat[0]
        if (chat.from_id == SESSION.load().id){
            holder.chat.text = "Saya : ${chat.message}"
        }else{
            holder.chat.text = "${chat.message}"
        }

        if(dokterChatClick != null){
            holder.itemView.setOnClickListener {
                dokterChatClick!!.onChat(item)
            }
        }
    }

    override fun getItemCount(): Int = data.size

    class DokterChatHolder(v: View): ViewHolder(v) {
        val name: TextView = v.findViewById(R.id.tv_name_itemdokterchat)
        val chat: TextView = v.findViewById(R.id.tv_chat_itemdokterchat)
    }

    interface DokterChatClick{
        fun onChat(data: DokterChat.Data)
    }
}