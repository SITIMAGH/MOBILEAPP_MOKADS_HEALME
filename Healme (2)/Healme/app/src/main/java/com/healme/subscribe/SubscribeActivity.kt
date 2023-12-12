package com.healme.subscribe

import android.app.AlertDialog
import android.os.Bundle
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.Toolbar
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.healme.R
import com.healme.utils.ServerApp
import com.healme.utils.endpoint.ResponseEP
import com.healme.utils.endpoint.VoucherEP
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class SubscribeActivity: AppCompatActivity(), SubscribeAdapter.SubscribeClick {
    lateinit var toolbar: Toolbar
    lateinit var rv: RecyclerView
    lateinit var adapter: SubscribeAdapter
    lateinit var VOUCHEREP: VoucherEP
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_subscribe)
        toolbar = findViewById(R.id.toolbar)
        setSupportActionBar(toolbar)
        VOUCHEREP = ServerApp.init().create(VoucherEP::class.java)

        rv = findViewById(R.id.rv_list_subscribe)
        rv.layoutManager = LinearLayoutManager(this)
        rv.setHasFixedSize(true)
        adapter = SubscribeAdapter()
        rv.adapter = adapter
        adapter.setSubscribesClick(this)

        VOUCHEREP.getAll("1").enqueue(object : Callback<Subscribe>{
            override fun onResponse(call: Call<Subscribe>, response: Response<Subscribe>) {
                if(response.body()!!.status.equals("200")){
                    adapter.Update(response.body()!!.data)
                }else{
                    Toast.makeText(applicationContext, "KOSONG", Toast.LENGTH_LONG).show()
                }
            }

            override fun onFailure(call: Call<Subscribe>, t: Throwable) {
                Toast.makeText(applicationContext, t.localizedMessage.toString(), Toast.LENGTH_LONG).show()
            }
        })
    }

    override fun onBuy(data: Subscribe.Data, position: Int) {
        var alertDialog = AlertDialog.Builder(this)
            .setTitle("PEMBELIAN VOUCHER")
            .setMessage("Apakah anda yakin ingin membeli item ini?")
            .setPositiveButton("BELI") { dialog, which ->
                var dataTrx: HashMap<String, Any> = HashMap()
                dataTrx.put("total", data.price)
                dataTrx.put("user_id", "1")

                var dataDtlTrx: HashMap<String, Any> = HashMap()
                dataDtlTrx.put("voucher_id", data.id)
                dataDtlTrx.put("price", data.price)
                dataDtlTrx.put("expired_at", data.time)

                dataTrx.put("detail", dataDtlTrx)

                VOUCHEREP.buy(dataTrx).enqueue(object : Callback<ResponseEP>{
                    override fun onResponse(
                        call: Call<ResponseEP>,
                        response: Response<ResponseEP>
                    ) {
                        Toast.makeText(applicationContext, response.body()!!.msg.toString(), Toast.LENGTH_LONG).show()
                        adapter.data[position].isPay = "0"
                        adapter.notifyDataSetChanged()
                    }

                    override fun onFailure(call: Call<ResponseEP>, t: Throwable) {
                        Toast.makeText(applicationContext, t.localizedMessage.toString(), Toast.LENGTH_LONG).show()
                    }

                })

                dialog.cancel()
            }
            .setNegativeButton("TIDAK"){ dialog, which ->
                dialog.cancel()
            }
            .show()
    }
}