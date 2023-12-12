package com.healme.utils.endpoint

import com.healme.chat.Roomchat
import com.healme.dokter.DokterChat
import retrofit2.Call
import retrofit2.http.Body
import retrofit2.http.GET
import retrofit2.http.POST
import retrofit2.http.Path

interface ChatEP {
    @POST("chat/room")
    fun room(@Body data: HashMap<String, Any>): Call<Roomchat>

    @POST("chat/send")
    fun send(@Body data: HashMap<String, Any>): Call<Roomchat>

    @GET("chat/list/{userId}")
    fun list(@Path("userId") user_id: String): Call<DokterChat>
}