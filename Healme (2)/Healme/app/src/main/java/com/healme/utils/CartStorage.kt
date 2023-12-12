package com.healme.utils

import android.content.Context
import android.content.SharedPreferences
import com.google.gson.Gson
import com.google.gson.reflect.TypeToken
import com.healme.cart.Cart

class CartStorage(context: Context) {

    private val CART_STORAGE = "cartStorage"
    private val pref: SharedPreferences = context.getSharedPreferences(CART_STORAGE, Context.MODE_PRIVATE)

    fun load(): ArrayList<Cart> {
        var data: ArrayList<Cart> = ArrayList()
        if(pref.getString("data", null) != null){
            data = Gson().fromJson(pref.getString("data", null).toString(), object : TypeToken<ArrayList<Cart>>(){}.type)
        }
        return data
    }

    fun loadById(id: String): Cart?{
        val data = load()
        for (item: Cart in data){
            if(item.id == id){
                return item
                break
            }
        }
        return null
    }
    fun indexById(id: String): Int?{
        val data = load()
        var index: Int = 0
        for (item: Cart in data){
            if(item.id == id){
                return index
                break
            }
            index++
        }
        return null
    }

    fun save(data: ArrayList<Cart>): Boolean = pref.edit().putString("data", Gson().toJson(data).toString()).commit()

    fun reset(): Boolean = pref.edit().remove("data").commit()
}