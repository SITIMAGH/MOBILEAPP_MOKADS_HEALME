package com.healme.dokter

import android.content.Intent
import android.os.Bundle
import android.view.Menu
import android.view.MenuItem
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.Toolbar
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.healme.LoginActivity
import com.healme.R
import com.healme.chat.RoomchatActivity
import com.healme.utils.ServerApp
import com.healme.utils.Session
import com.healme.utils.endpoint.ChatEP
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class DokterActivity: AppCompatActivity(), DokterChatAdapter.DokterChatClick {
    lateinit var toolbar: Toolbar
    lateinit var rv: RecyclerView
    lateinit var adapter: DokterChatAdapter
    lateinit var SESSION: Session
    lateinit var CHATEP: ChatEP

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_dokter)
        toolbar = findViewById(R.id.toolbar)
        setSupportActionBar(toolbar)
        rv = findViewById(R.id.rv_list_chatdokter)
        rv.layoutManager = LinearLayoutManager(this)
        rv.setHasFixedSize(true)
        adapter = DokterChatAdapter()
        rv.adapter = adapter
        adapter.setDoktersChatClick(this)

        SESSION = Session(this)
        CHATEP = ServerApp.init().create(ChatEP::class.java)
        CHATEP.list(SESSION.load().id.toString()).enqueue(object : Callback<DokterChat>{
            override fun onResponse(call: Call<DokterChat>, response: Response<DokterChat>) {
                if(response.body()!!.status.equals("200")){
                    adapter.Update(response.body()!!.data)
                }else{
                    Toast.makeText(applicationContext, "KOSONG", Toast.LENGTH_LONG).show()
                }
            }

            override fun onFailure(call: Call<DokterChat>, t: Throwable) {
                Toast.makeText(applicationContext, t.localizedMessage, Toast.LENGTH_LONG).show()
            }
        })
    }

    override fun onChat(data: DokterChat.Data) {
        val i = Intent(applicationContext, RoomchatActivity::class.java)
        i.putExtra("id", data.user.id.toString())
        startActivity(i)
    }

    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
        menuInflater.inflate(R.menu.toolbars, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        when(item.itemId){
            R.id.logout -> {
                Session(this).reset()
                startActivity(Intent(this, LoginActivity::class.java))
                finish()
                return true
            }
            else -> {
                return super.onOptionsItemSelected(item)
            }
        }
    }
}