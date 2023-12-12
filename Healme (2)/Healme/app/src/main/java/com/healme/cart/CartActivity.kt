package com.healme.cart

import android.os.Bundle
import android.util.Log
import android.widget.ArrayAdapter
import android.widget.AutoCompleteTextView
import android.widget.Button
import android.widget.TextView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.Toolbar
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.google.android.material.textfield.TextInputLayout
import com.healme.R
import com.healme.utils.CartStorage
import com.healme.utils.ServerApp
import com.healme.utils.endpoint.ObatEP
import com.healme.utils.endpoint.ResponseEP
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import retrofit2.create

class CartActivity: AppCompatActivity(), CartAdapter.CartClick {
    lateinit var toolbar: Toolbar
    lateinit var rv: RecyclerView
    lateinit var adapter: CartAdapter
    lateinit var qty: TextView
    lateinit var total: TextView
    lateinit var type: AutoCompleteTextView
    lateinit var address: TextInputLayout
    lateinit var note: TextInputLayout
    lateinit var btnCheckout: Button

    lateinit var CARTSTORAGE: CartStorage
    lateinit var OBATEP: ObatEP

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_cart)
        toolbar = findViewById(R.id.toolbar)
        setSupportActionBar(toolbar)
        rv = findViewById(R.id.rv_list_cart)
        rv.layoutManager = LinearLayoutManager(this)
        rv.isNestedScrollingEnabled = false
        rv.setHasFixedSize(true)
        adapter = CartAdapter()
        rv.adapter = adapter
        adapter.setCartsClick(this)

        qty = findViewById(R.id.tv_qty_cart)
        total = findViewById(R.id.tv_total_cart)

        type = findViewById(R.id.act_tipe_cart)
        address = findViewById(R.id.til_address_cart)
        note = findViewById(R.id.til_note_cart)
        btnCheckout =findViewById(R.id.btn_checkout)

        var adapterType = ArrayAdapter<String>(this, android.R.layout.simple_dropdown_item_1line, arrayOf("rumah", "kantor"))
        type.setAdapter(adapterType)
        type.isEnabled = false

        OBATEP = ServerApp.init().create(ObatEP::class.java)

        btnCheckout.setOnClickListener {
            var dataTrx: HashMap<String, Any> = HashMap()
            dataTrx.put("total", total.text.toString().replace("Rp ", ""))
            dataTrx.put("user_id", "1")
            dataTrx.put("shipment_type", type.text.toString())
            dataTrx.put("address", address.editText!!.text.toString())
            dataTrx.put("note", note.editText!!.text.toString())

            var dataDtlTrx: ArrayList<Any> = ArrayList()
            CARTSTORAGE.load().forEach {
                var dataDtlItemTrx: HashMap<String, Any> = HashMap()
                dataDtlItemTrx.put("obat_id", it.id)
                dataDtlItemTrx.put("price", it.price)
                dataDtlItemTrx.put("qty", it.qty)
                dataDtlItemTrx.put("total", (it.qty.toInt() * it.price.toInt()))
                dataDtlTrx.add(dataDtlItemTrx)
            }

            dataTrx.put("detail", dataDtlTrx)
            Log.d("DATAKU", dataTrx.toString())

            OBATEP.buyObat(dataTrx).enqueue(object : Callback<ResponseEP> {
                override fun onResponse(
                    call: Call<ResponseEP>,
                    response: Response<ResponseEP>
                ) {
                    Toast.makeText(applicationContext, response.body()!!.msg.toString(), Toast.LENGTH_LONG).show()
                    CARTSTORAGE.reset()
                    adapter.Update(CARTSTORAGE.load())
                    calcCart()
                    type.setText("")
                    address.editText!!.setText("")
                    note.editText!!.setText("")
                }

                override fun onFailure(call: Call<ResponseEP>, t: Throwable) {
                    Toast.makeText(applicationContext, t.localizedMessage.toString(), Toast.LENGTH_LONG).show()
                }

            })
        }


        CARTSTORAGE = CartStorage(this)

        adapter.Update(CARTSTORAGE.load())
        calcCart()
    }

    override fun onPlus(data: Cart, position: Int) {
        val dataCart = CARTSTORAGE.load()
        dataCart[CARTSTORAGE.indexById(data.id)!!].qty = (dataCart[CARTSTORAGE.indexById(data.id)!!].qty.toInt() + 1).toString()
        CARTSTORAGE.save(dataCart)
        adapter.Update(CARTSTORAGE.load())
        calcCart()
    }

    override fun onMin(data: Cart, position: Int) {
        val dataCart = CARTSTORAGE.load()
        if(dataCart[CARTSTORAGE.indexById(data.id)!!].qty.toInt() > 1){
            dataCart[CARTSTORAGE.indexById(data.id)!!].qty = (dataCart[CARTSTORAGE.indexById(data.id)!!].qty.toInt() - 1).toString()
            CARTSTORAGE.save(dataCart)
            adapter.Update(CARTSTORAGE.load())
            calcCart()
        }
    }

    override fun onRemove(data: Cart, position: Int) {
        val dataCart = CARTSTORAGE.load()
        dataCart.removeAt(CARTSTORAGE.indexById(data.id)!!)
        CARTSTORAGE.save(dataCart)
        adapter.Update(CARTSTORAGE.load())
        calcCart()
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
}