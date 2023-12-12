package com.healme.utils.endpoint

import com.healme.obat.Obat
import retrofit2.Call
import retrofit2.http.Body
import retrofit2.http.GET
import retrofit2.http.POST

interface ObatEP {
    @GET("obat")
    fun getAll(): Call<Obat>

    @POST("obat/buy")
    fun buyObat(@Body data: HashMap<String, Any>): Call<ResponseEP>
}