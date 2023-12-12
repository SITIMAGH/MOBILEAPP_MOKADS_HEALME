package com.healme

import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.widget.Button
import android.widget.TextView
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import com.Auth
import com.google.android.gms.auth.api.signin.GoogleSignIn
import com.google.android.gms.auth.api.signin.GoogleSignInAccount
import com.google.android.gms.auth.api.signin.GoogleSignInClient
import com.google.android.gms.auth.api.signin.GoogleSignInOptions
import com.google.android.gms.common.SignInButton
import com.google.android.gms.common.api.ApiException
import com.google.android.gms.tasks.Task
import com.google.android.material.textfield.TextInputLayout
import com.google.firebase.auth.FirebaseAuth
import com.healme.dokter.DokterActivity
import com.healme.utils.ServerApp
import com.healme.utils.Session
import com.healme.utils.endpoint.AuthEP
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class LoginActivity : AppCompatActivity(){
    lateinit var phone: TextInputLayout
    lateinit var password: TextInputLayout
    lateinit var btnLogin: Button
    lateinit var toRegister: TextView

    lateinit var mGoogleSignInClient: GoogleSignInClient
    lateinit var fba: FirebaseAuth
    val AUTH_CODE = 1001
    lateinit var signInButton: SignInButton

    lateinit var AUTHEP: AuthEP
    lateinit var SESSION: Session

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)
        phone = findViewById(R.id.et_phone_login)
        password = findViewById(R.id.et_password_login)
        btnLogin = findViewById(R.id.btn_login)
        toRegister = findViewById(R.id.btn_toregister_login)

        AUTHEP = ServerApp.init().create(AuthEP::class.java)
        SESSION = Session(this)

        if(SESSION.isLoged()){
            if(SESSION.load().role.equals("user")){
                startActivity(Intent(applicationContext, MainActivity::class.java))
                finish()
            }else{
                startActivity(Intent(applicationContext, DokterActivity::class.java))
                finish()
            }
        }

        toRegister.setOnClickListener {
            startActivity(Intent(applicationContext, RegisterActivity::class.java))
            finish()
        }

        btnLogin.setOnClickListener {
//            startActivity(Intent(applicationContext, MainActivity::class.java))
            val data = HashMap<String, Any>()
            data.put("phone", phone.editText!!.text.toString())
            data.put("password", password.editText!!.text.toString())

            AUTHEP.login(data).enqueue(object : Callback<Auth>{
                override fun onResponse(call: Call<Auth>, response: Response<Auth>) {
                    if(response.body()!!.status.equals("200")){
                        if(response.body()!!.data.role.equals("user")){
                            SESSION.save(response.body()!!.data)
                            startActivity(Intent(applicationContext, MainActivity::class.java))
                            finish()
                        }else{
                            SESSION.save(response.body()!!.data)
                            startActivity(Intent(applicationContext, DokterActivity::class.java))
                            finish()
                        }
                    }
                    Toast.makeText(applicationContext, response.body()!!.msg, Toast.LENGTH_LONG).show()
                }

                override fun onFailure(call: Call<Auth>, t: Throwable) {
                    Toast.makeText(applicationContext, t.localizedMessage, Toast.LENGTH_LONG).show()
                }
            })
        }

        var gso = GoogleSignInOptions.Builder(GoogleSignInOptions.DEFAULT_SIGN_IN)
            .requestIdToken(getString(R.string.default_web_client_id))
            .requestEmail()
            .build()
        mGoogleSignInClient = GoogleSignIn.getClient(this, gso)

        signInButton = findViewById(R.id.signinbtn)
        signInButton.setOnClickListener {
            var intent = mGoogleSignInClient.signInIntent
            startActivityForResult(intent, AUTH_CODE)
        }
    }

    override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
        super.onActivityResult(requestCode, resultCode, data)
        if(requestCode == AUTH_CODE){
            var task: Task<GoogleSignInAccount> = GoogleSignIn.getSignedInAccountFromIntent(data)
            try {
                val account: GoogleSignInAccount = task.getResult(ApiException::class.java)
                if(account != null){
//                    Toast.makeText(applicationContext, "Login SUccess ${account.email} - ${account.id}", Toast.LENGTH_LONG).show()
                    val data = HashMap<String, Any>()
                    data.put("name", account.displayName.toString())
                    data.put("google_auth", "${account.id}-${account.email}")

                    AUTHEP.loginGoogle(data).enqueue(object : Callback<Auth>{
                        override fun onResponse(call: Call<Auth>, response: Response<Auth>) {
                            if(response.body()!!.status.equals("200")){
                                SESSION.save(response.body()!!.data)
                                startActivity(Intent(applicationContext, MainActivity::class.java))
                                finish()
                            }
                            Toast.makeText(applicationContext, response.body()!!.msg, Toast.LENGTH_LONG).show()
                        }

                        override fun onFailure(call: Call<Auth>, t: Throwable) {
                            Toast.makeText(applicationContext, t.localizedMessage, Toast.LENGTH_LONG).show()
                        }
                    })
                }
            }catch (e: ApiException){
                Toast.makeText(applicationContext, e.localizedMessage, Toast.LENGTH_LONG).show()
            }
        }
    }
}