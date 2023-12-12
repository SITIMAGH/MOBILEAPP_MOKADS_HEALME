package com.healme.obat

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.TextView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.Toolbar
import androidx.recyclerview.widget.GridLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.google.gson.Gson
import com.healme.R
import com.healme.cart.Cart
import com.healme.cart.CartActivity
import com.healme.utils.CartStorage
import com.healme.utils.ServerApp
import com.healme.utils.endpoint.ObatEP
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class ObatActivity: AppCompatActivity(), ObatAdapter.ObatClick {
    lateinit var toolbar: Toolbar
    lateinit var rv: RecyclerView
    lateinit var adapter: ObatAdapter
    lateinit var qty: TextView
    lateinit var total: TextView

    lateinit var OBATEP: ObatEP
    lateinit var CARTSTORAGE: CartStorage
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_obat)
        toolbar = findViewById(R.id.toolbar)
        setSupportActionBar(toolbar)
        OBATEP = ServerApp.init().create(ObatEP::class.java)
        rv = findViewById(R.id.rv_list_obat)
        rv.layoutManager = GridLayoutManager(this, 2)
        rv.setHasFixedSize(true)
        adapter = ObatAdapter()
        rv.adapter = adapter
        adapter.setObatsClick(this)

        qty = findViewById(R.id.tv_qty_obat)
        total = findViewById(R.id.tv_total_obat)
        CARTSTORAGE = CartStorage(this)

        getAll()

        (findViewById<Button>(R.id.btn_toCart)).setOnClickListener {
            startActivity(Intent(this, CartActivity::class.java))
        }

    }

    override fun onDetailObat(data: Obat.Data) {
        var i = Intent(this, DetailObatActivity::class.java)
        i.putExtra("data", Gson().toJson(data).toString())
        startActivity(i)
    }

    override fun onAddCart(data: Obat.Data) {
        val newData = CARTSTORAGE.load()
        newData.add(Cart(id = data.id, name = data.name, price = data.price, qty = "1", img = data.image))
        CARTSTORAGE.save(newData)
        calcCart()
        adapter.notifyDataSetChanged()
    }

    fun calcCart(){
        var sQty: Int = 0
        var sTotal: Int = 0

        CARTSTORAGE.load().forEach {
            sQty += it.qty.toInt()
            sTotal += it.price.toInt() * it.qty.toInt()
        }

        qty.text = sQty.toString()
        total.text = "Rp ${sTotal}"
    }

    override fun onResume() {
        super.onResume()
        getAll()
    }

    fun getAll(){
        OBATEP.getAll().enqueue(object : Callback<Obat>{
            override fun onResponse(call: Call<Obat>, response: Response<Obat>) {
                if(response.body()!!.status.equals("200")){
                    adapter.Update(response.body()!!.data)
                    calcCart()
                }else{
                    Toast.makeText(applicationContext, "KOSONG", Toast.LENGTH_LONG).show()
                }
            }

            override fun onFailure(call: Call<Obat>, t: Throwable) {
                Toast.makeText(applicationContext, t.localizedMessage.toString(), Toast.LENGTH_LONG).show()
            }
        })
    }
}