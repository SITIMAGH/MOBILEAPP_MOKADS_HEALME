package com.healme.janji

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Toast
import androidx.fragment.app.Fragment
import androidx.recyclerview.widget.GridLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.healme.R
import com.healme.utils.ServerApp
import com.healme.utils.endpoint.DokterEP
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class DokterFragment: Fragment() {
    lateinit var rv: RecyclerView
    lateinit var adapter: DokterAdapter
    lateinit var DOKTEREP: DokterEP
    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        return inflater.inflate(R.layout.fragment_dokter, container, false)
    }

    override fun onViewCreated(v: View, savedInstanceState: Bundle?) {
        super.onViewCreated(v, savedInstanceState)
        DOKTEREP = ServerApp.init().create(DokterEP::class.java)
        rv = v.findViewById(R.id.rv_list_dokter)
        rv.layoutManager = GridLayoutManager(requireActivity(), 3)
        rv.setHasFixedSize(true)
        rv.isNestedScrollingEnabled = false
        adapter = DokterAdapter()
        rv.adapter = adapter

        DOKTEREP.getAll(null).enqueue(object : Callback<Dokter>{
            override fun onResponse(call: Call<Dokter>, response: Response<Dokter>) {
                if(response.body()!!.status.equals("200")){
                    adapter.Update(response.body()!!.data)
                }else{
                    Toast.makeText(requireActivity(), "KOSONG", Toast.LENGTH_LONG).show()
                }
            }

            override fun onFailure(call: Call<Dokter>, t: Throwable) {
                Toast.makeText(requireActivity(), t.localizedMessage.toString(), Toast.LENGTH_LONG).show()
            }

        })
    }
}