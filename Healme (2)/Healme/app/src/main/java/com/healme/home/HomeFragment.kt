package com.healme.home

import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.LinearLayout
import android.widget.Toast
import androidx.fragment.app.Fragment
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import androidx.viewpager.widget.ViewPager
import com.google.gson.Gson
import com.healme.R
import com.healme.chat.ChatActivity
import com.healme.janji.JanjiActivity
import com.healme.obat.ObatActivity
import com.healme.subscribe.SubscribeActivity
import com.healme.utils.ServerApp
import com.healme.utils.endpoint.ArtikelEP
import com.healme.utils.endpoint.PromoEP
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class HomeFragment: Fragment(), ArtikelAdapter.ArtikelClick {
    lateinit var promo: ViewPager
    lateinit var artikel: RecyclerView
    lateinit var artikelAdapter: ArtikelAdapter
    lateinit var toChat: LinearLayout
    lateinit var toObat: LinearLayout
    lateinit var toJanji: LinearLayout
    lateinit var toSubscribe: LinearLayout

    lateinit var PROMOEP: PromoEP
    lateinit var ARTIKELEPL: ArtikelEP

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        return inflater.inflate(R.layout.fragment_home, container, false)
    }

    override fun onViewCreated(v: View, savedInstanceState: Bundle?) {
        super.onViewCreated(v, savedInstanceState)
        PROMOEP = ServerApp.init().create(PromoEP::class.java)
        ARTIKELEPL = ServerApp.init().create(ArtikelEP::class.java)

        promo = v.findViewById(R.id.vp_promo_home)

        PROMOEP.getAll().enqueue(object : Callback<Promo>{
            override fun onResponse(call: Call<Promo>, response: Response<Promo>) {
                if(response.body()!!.status.equals("200")){
                    var adapter = PromoAdapter(requireActivity(), response.body()!!.data)
                    promo.adapter = adapter
                }else{
                    Toast.makeText(requireActivity(), "KOSONG", Toast.LENGTH_LONG).show()
                }
            }

            override fun onFailure(call: Call<Promo>, t: Throwable) {
                Toast.makeText(requireActivity(), t.localizedMessage.toString(), Toast.LENGTH_LONG).show()
            }
        })

        artikel = v.findViewById(R.id.rv_artikel_home)
        artikel.layoutManager = LinearLayoutManager(activity)
        artikel.setHasFixedSize(true)
        artikelAdapter = ArtikelAdapter()
        artikel.adapter = artikelAdapter
        artikelAdapter.setArticleClick(this)

        ARTIKELEPL.getAll().enqueue(object : Callback<Artikel>{
            override fun onResponse(call: Call<Artikel>, response: Response<Artikel>) {
                if(response.body()!!.status.equals("200")){
                    artikelAdapter.Update(response.body()!!.data)
                }else{
                    Toast.makeText(requireActivity(), "KOSONG", Toast.LENGTH_LONG).show()
                }
            }

            override fun onFailure(call: Call<Artikel>, t: Throwable) {
                Toast.makeText(requireActivity(), t.localizedMessage.toString(), Toast.LENGTH_LONG).show()
            }
        })

        toChat = v.findViewById(R.id.ln_chat_home)
        toChat.setOnClickListener {
            startActivity(Intent(activity, ChatActivity::class.java))
        }
        toObat = v.findViewById(R.id.ln_obat_home)
        toObat.setOnClickListener {
            startActivity(Intent(activity, ObatActivity::class.java))
        }
        toJanji = v.findViewById(R.id.ln_janji_home)
        toJanji.setOnClickListener {
            startActivity(Intent(activity, JanjiActivity::class.java))
        }
        toSubscribe = v.findViewById(R.id.ln_subscribe_home)
        toSubscribe.setOnClickListener {
            startActivity(Intent(activity, SubscribeActivity::class.java))
        }
    }

    override fun onDetailArtikel(data: Artikel.Data) {
        var i = Intent(activity, DetailArticleActivity::class.java)
        i.putExtra("data", Gson().toJson(data).toString())
        startActivity(i)
    }
}