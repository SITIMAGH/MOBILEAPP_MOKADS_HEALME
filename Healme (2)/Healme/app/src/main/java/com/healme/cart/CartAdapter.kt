package com.healme.cart

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

class CartAdapter: Adapter<CartAdapter.CartHolder>() {
    var data: ArrayList<Cart> = ArrayList()
    lateinit var context: Context
    var cartClick: CartClick? = null

    fun Update(data: ArrayList<Cart>){
        this.data = data
        notifyDataSetChanged()
    }

    fun setCartsClick(cartClick: CartClick){
        this.cartClick=cartClick
        notifyDataSetChanged()
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): CartHolder {
        context = parent.context
        var v = LayoutInflater.from(context).inflate(R.layout.item_cart, parent, false)
        return CartHolder(v)
    }

    override fun onBindViewHolder(holder: CartHolder, position: Int) {
        var item = data[position]
        holder.name.text = item.name
        holder.price.text = "Rp ${item.price}"
        holder.qty.text = item.qty
        Glide.with(context).load("${ServerApp.baseURL}files/${item.img}").into(holder.img)

        if(cartClick != null){
            holder.add.setOnClickListener {
                cartClick!!.onPlus(item, position)
            }

            holder.min.setOnClickListener {
                cartClick!!.onMin(item, position)
            }

            holder.rmv.setOnClickListener {
                cartClick!!.onRemove(item, position)
            }
        }
    }

    override fun getItemCount(): Int = data.size

    class CartHolder(v: View): ViewHolder(v) {
        var name: TextView = v.findViewById(R.id.tv_name_itemcart)
        var price: TextView = v.findViewById(R.id.tv_price_itemcart)
        var qty: TextView = v.findViewById(R.id.tv_qty_itemcart)
        var rmv: ImageView = v.findViewById(R.id.iv_rmv_itemcart)
        var min: ImageView = v.findViewById(R.id.iv_min_itemcart)
        var add: ImageView = v.findViewById(R.id.iv_add_itemcart)
        var img: ImageView = v.findViewById(R.id.iv_img_itemcart)
    }

    interface CartClick{
        fun onPlus(data: Cart, position: Int)
        fun onMin(data: Cart, position: Int)
        fun onRemove(data: Cart, position: Int)
    }
}