package com.healme.history

import android.content.Intent
import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Toast
import androidx.fragment.app.Fragment
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.healme.R
import com.healme.utils.ServerApp
import com.healme.utils.endpoint.TransactionEP
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class HistoryFragment: Fragment(), HistoryAdapter.HistoryClick {
    lateinit var rv: RecyclerView
    lateinit var adapter: HistoryAdapter
    lateinit var TRANSACTIONEP: TransactionEP
    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        return inflater.inflate(R.layout.fragment_history, container, false)
    }

    override fun onViewCreated(v: View, savedInstanceState: Bundle?) {
        super.onViewCreated(v, savedInstanceState)
        rv = v.findViewById(R.id.rv_list_history)
        rv.layoutManager = LinearLayoutManager(activity)
        rv.setHasFixedSize(true)
        adapter = HistoryAdapter()
        rv.adapter = adapter
        adapter.setHistorysClick(this)

        TRANSACTIONEP = ServerApp.init().create(TransactionEP::class.java)
        TRANSACTIONEP.getAll("1").enqueue(object : Callback<History>{
            override fun onResponse(call: Call<History>, response: Response<History>) {
                if(response.body()!!.status.equals("200")){
                    adapter.Update(response.body()!!.data)
                }else{
                    Toast.makeText(requireActivity(), "KOSONG", Toast.LENGTH_LONG).show()
                }
            }

            override fun onFailure(call: Call<History>, t: Throwable) {
                Toast.makeText(requireActivity(), t.localizedMessage.toString(), Toast.LENGTH_LONG).show()
            }
        })
    }

    override fun onDetail(data: History.Data) {
        val i = Intent(requireContext(), DetailTransactionActivity::class.java)
        i.putExtra("id", data.trxID)
        i.putExtra("type", data.type)
        startActivity(i)
    }
}