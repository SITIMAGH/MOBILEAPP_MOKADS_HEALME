package com.healme.chat

import android.content.Context
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView.Adapter
import androidx.recyclerview.widget.RecyclerView.ViewHolder
import com.healme.R
import com.healme.utils.Session

class RoomchatAdapter: Adapter<RoomchatAdapter.RoomchatHolder>() {
    var data: ArrayList<Roomchat.Data> = ArrayList()
    lateinit var context: Context
    lateinit var SESSION: Session

    fun Update(data: ArrayList<Roomchat.Data>){
        this.data = data
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): RoomchatHolder {
        context = parent.context
        SESSION = Session(context)
        var v = LayoutInflater.from(context).inflate(R.layout.item_roomchat, parent, false)
        return RoomchatHolder(v)
    }

    override fun onBindViewHolder(holder: RoomchatHolder, position: Int) {
        val item = data[position]

        if(SESSION.load().id!!.equals(item.from_id)){
            holder.rightChat.text = item.message
            holder.rightChat.visibility = View.VISIBLE
            holder.leftChat.visibility = View.GONE
        }else{
            holder.leftChat.text = item.message
            holder.leftChat.visibility = View.VISIBLE
            holder.rightChat.visibility = View.GONE
        }
    }

    override fun getItemCount(): Int = data.size

    class RoomchatHolder(v: View) : ViewHolder(v){
        val leftChat: TextView = v.findViewById(R.id.tv_left_itemroomchat)
        val rightChat: TextView = v.findViewById(R.id.tv_right_itemroomchat)
    }
}