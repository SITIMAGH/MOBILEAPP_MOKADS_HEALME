package com.healme

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.TextView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.google.android.material.textfield.TextInputLayout
import com.healme.utils.ServerApp
import com.healme.utils.endpoint.AuthEP
import com.healme.utils.endpoint.ResponseEP
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class RegisterActivity: AppCompatActivity() {
    lateinit var name : TextInputLayout
    lateinit var phone : TextInputLayout
    lateinit var password : TextInputLayout
    lateinit var confirmPassword : TextInputLayout
    lateinit var btnRegister : Button
    lateinit var toLogin : TextView

    lateinit var AUTHEP: AuthEP

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_register)
        name = findViewById(R.id.et_name_register)
        phone = findViewById(R.id.et_phone_register)
        password = findViewById(R.id.et_password_register)
        confirmPassword = findViewById(R.id.et_confirmpassword_register)
        btnRegister = findViewById(R.id.btn_register)
        toLogin = findViewById(R.id.btn_tologin_register)

        AUTHEP = ServerApp.init().create(AuthEP::class.java)

        btnRegister.setOnClickListener {
            val data = HashMap<String, Any>()
            data.put("name", name.editText!!.text.toString())
            data.put("phone", phone.editText!!.text.toString())
            data.put("password", password.editText!!.text.toString())
            if(confirmPassword.editText!!.text.toString() == password.editText!!.text.toString()){
                AUTHEP.register(data).enqueue(object : Callback<ResponseEP>{
                    override fun onResponse(
                        call: Call<ResponseEP>,
                        response: Response<ResponseEP>
                    ) {
                        if(response.body()!!.status.equals("200")){
                            startActivity(Intent(applicationContext, LoginActivity::class.java))
                            finish()
                        }
                        Toast.makeText(applicationContext, response.body()!!.msg, Toast.LENGTH_LONG).show()
                    }

                    override fun onFailure(call: Call<ResponseEP>, t: Throwable) {
                        Toast.makeText(applicationContext, t.localizedMessage, Toast.LENGTH_LONG).show()
                    }
                })
            }else{
                Toast.makeText(applicationContext, "Password Tidak Sama", Toast.LENGTH_LONG).show()
            }
        }

        toLogin.setOnClickListener {
            startActivity(Intent(applicationContext, LoginActivity::class.java))
            finish()
        }
    }
}