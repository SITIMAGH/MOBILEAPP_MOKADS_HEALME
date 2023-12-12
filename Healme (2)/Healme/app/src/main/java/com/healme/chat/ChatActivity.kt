package com.healme.chat

import android.app.AlertDialog
import android.content.DialogInterface
import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.Toolbar
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.healme.R
import com.healme.janji.Dokter
import com.healme.utils.ServerApp
import com.healme.utils.endpoint.DokterEP
import com.healme.utils.endpoint.ResponseEP
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.util.Objects

class ChatActivity: AppCompatActivity(), ChatAdapter.ChatClick {
    lateinit var toolbar: Toolbar
    lateinit var rv: RecyclerView
    lateinit var adapter: ChatAdapter

    lateinit var DOKTEREP: DokterEP

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_chat)
        toolbar = findViewById(R.id.toolbar)
        setSupportActionBar(toolbar)
        DOKTEREP = ServerApp.init().create(DokterEP::class.java)

        rv = findViewById(R.id.rv_list_chat)
        rv.layoutManager = LinearLayoutManager(this)
        rv.setHasFixedSize(true)
        adapter = ChatAdapter()
        rv.adapter = adapter
        adapter.setChatsClick(this)

        DOKTEREP.getAll("1").enqueue(object : Callback<Dokter>{
            override fun onResponse(call: Call<Dokter>, response: Response<Dokter>) {
                if(response.body()!!.status.equals("200")){
                    adapter.Update(response.body()!!.data)
                }else{
                    Toast.makeText(applicationContext, "KOSONG", Toast.LENGTH_LONG).show()
                }
            }

            override fun onFailure(call: Call<Dokter>, t: Throwable) {
                Toast.makeText(applicationContext, t.localizedMessage.toString(), Toast.LENGTH_LONG).show()
            }

        })
    }

    override fun onBuy(data: Dokter.Data, position: Int) {
        var alertDialog = AlertDialog.Builder(this)
            .setTitle("PEMBELIAN CHAT")
            .setMessage("Apakah anda yakin ingin membeli item ini?")
            .setPositiveButton("BELI") { dialog, which ->

                var dataTrx: HashMap<String, Any> = HashMap()
                dataTrx.put("total", data.price)
                dataTrx.put("user_id", "1")

                var dataDtlTrx: HashMap<String, Any> = HashMap()
                dataDtlTrx.put("dokter_id", data.id)
                dataDtlTrx.put("price", data.price)

                dataTrx.put("detail", dataDtlTrx)

                DOKTEREP.buyChat(dataTrx).enqueue(object : Callback<ResponseEP>{
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

    override fun onChat(data: Dokter.Data, position: Int) {
        val i = Intent(applicationContext, RoomchatActivity::class.java)
        i.putExtra("id", data.id)
        startActivity(i)
    }
}