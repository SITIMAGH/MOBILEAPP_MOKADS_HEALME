package com.healme.utils.endpoint

import com.Auth
import retrofit2.Call
import retrofit2.http.Body
import retrofit2.http.POST

interface AuthEP {
    @POST("auth/register")
    fun register(@Body data: HashMap<String, Any>): Call<ResponseEP>

    @POST("auth/login")
    fun login(@Body data: HashMap<String, Any>): Call<Auth>

    @POST("auth/logingoogle")
    fun loginGoogle(@Body data: HashMap<String, Any>): Call<Auth>
}