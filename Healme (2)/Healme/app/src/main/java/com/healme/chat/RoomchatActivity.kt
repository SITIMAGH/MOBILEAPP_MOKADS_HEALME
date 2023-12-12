package com.healme.chat

import android.os.Bundle
import android.widget.Button
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.Toolbar
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.google.android.material.textfield.TextInputLayout
import com.healme.R
import com.healme.utils.ServerApp
import com.healme.utils.Session
import com.healme.utils.endpoint.ChatEP
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class RoomchatActivity: AppCompatActivity() {
    lateinit var toolbar: Toolbar
    lateinit var rv: RecyclerView
    lateinit var adapter: RoomchatAdapter
    lateinit var message: TextInputLayout
    lateinit var btnSend: Button

    lateinit var CHATEP: ChatEP
    lateinit var SESSION: Session
    var TOKEN: String? = ""
    var CHATID: String? = ""

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_roomchat)
        toolbar = findViewById(R.id.toolbar)
        setSupportActionBar(toolbar)
        rv = findViewById(R.id.rv_list_roomchat)
        rv.layoutManager = LinearLayoutManager(this)
        rv.setHasFixedSize(true)
        adapter = RoomchatAdapter()
        rv.adapter = adapter

        message = findViewById(R.id.et_message_roomchat)
        btnSend = findViewById(R.id.btn_send_roomchat)

        CHATEP = ServerApp.init().create(ChatEP::class.java)
        SESSION = Session(this)

        val roomData = HashMap<String, Any>()
        roomData.put("from_id", SESSION.load().id.toString())
        roomData.put("to_id", intent.getStringExtra("id").toString())

        CHATEP.room(roomData).enqueue(object : Callback<Roomchat>{
            override fun onResponse(call: Call<Roomchat>, response: Response<Roomchat>) {
                if(response.body()!!.status.equals("200")){
                    TOKEN = response.body()!!.token.toString()
                    CHATID = response.body()!!.chat_id.toString()
                    adapter.Update(response.body()!!.data)
                }
            }

            override fun onFailure(call: Call<Roomchat>, t: Throwable) {
                Toast.makeText(applicationContext, t.localizedMessage, Toast.LENGTH_LONG).show()
            }
        })

        btnSend.setOnClickListener {
            var data = HashMap<String, Any>()
            data.put("token", TOKEN.toString())
            data.put("chat_id", CHATID.toString())
            data.put("from_id", SESSION.load().id.toString())
            data.put("to_id", intent.getStringExtra("id").toString())
            data.put("message", message.editText!!.text.toString())

            CHATEP.send(data).enqueue(object : Callback<Roomchat>{
                override fun onResponse(call: Call<Roomchat>, response: Response<Roomchat>) {
                    if(response.body()!!.status.equals("200")){
                        TOKEN = response.body()!!.token.toString()
                        CHATID = response.body()!!.chat_id.toString()

                        val newData = adapter.data
                        newData.add(response.body()!!.data[0])
                        adapter.Update(newData)
                        rv.smoothScrollToPosition(adapter.data.size - 1)

                        message.editText!!.setText("")
                    }
                }

                override fun onFailure(call: Call<Roomchat>, t: Throwable) {
                    Toast.makeText(applicationContext, t.localizedMessage, Toast.LENGTH_LONG).show()
                }
            })
        }
    }
}