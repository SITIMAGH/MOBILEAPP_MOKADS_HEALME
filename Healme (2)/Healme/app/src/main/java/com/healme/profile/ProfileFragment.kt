package com.healme.profile

import android.os.Bundle
import android.util.Log
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.Button
import android.widget.Toast
import androidx.fragment.app.Fragment
import com.google.android.material.textfield.TextInputLayout
import com.healme.R
import com.healme.utils.ServerApp
import com.healme.utils.endpoint.ProfileEP
import com.healme.utils.endpoint.ResponseEP
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class ProfileFragment: Fragment() {
    lateinit var name: TextInputLayout
    lateinit var phone: TextInputLayout
    lateinit var password : TextInputLayout
    lateinit var btnUpdate: Button

    lateinit var PROFILEEP: ProfileEP

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View? {
        return inflater.inflate(R.layout.fragment_profile, container, false)
    }

    override fun onViewCreated(v: View, savedInstanceState: Bundle?) {
        super.onViewCreated(v, savedInstanceState)
        PROFILEEP = ServerApp.init().create(ProfileEP::class.java)
        name = v.findViewById(R.id.et_name_profile)
        phone = v.findViewById(R.id.et_phone_profile)
        password = v.findViewById(R.id.et_password_profile)
        btnUpdate = v.findViewById(R.id.btn_profile)

        get()

        btnUpdate.setOnClickListener {
            val data: HashMap<String, Any> = HashMap()
            data.put("name", name.editText!!.text.toString())
            data.put("phone", phone.editText!!.text.toString())
            data.put("password", password.editText!!.text.toString())

            PROFILEEP.update("1", data).enqueue(object : Callback<ResponseEP>{
                override fun onResponse(call: Call<ResponseEP>, response: Response<ResponseEP>) {
                    Toast.makeText(requireActivity(),response.body()!!.msg, Toast.LENGTH_LONG).show()
                    get()
                }

                override fun onFailure(call: Call<ResponseEP>, t: Throwable) {
                    Toast.makeText(requireActivity(),t.localizedMessage, Toast.LENGTH_LONG).show()
                    Log.d("ERRORKU", t.message.toString())
                }
            })
        }
    }

    fun get(){
        PROFILEEP.get("1").enqueue(object: Callback<Profile>{
            override fun onResponse(call: Call<Profile>, response: Response<Profile>) {
                if(response.body()!!.status.equals("200")){
                    val item = response.body()!!.data
                    name.editText!!.setText(item.name)
                    phone.editText!!.setText(item.phone)
                    password.editText!!.setText("")
                }
            }

            override fun onFailure(call: Call<Profile>, t: Throwable) {
                Toast.makeText(requireActivity(), t.localizedMessage, Toast.LENGTH_LONG).show()
            }
        })
    }
}