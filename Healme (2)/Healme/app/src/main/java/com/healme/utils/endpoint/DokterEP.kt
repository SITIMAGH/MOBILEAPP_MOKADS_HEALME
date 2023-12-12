package com.healme.utils.endpoint

import com.healme.janji.Dokter
import retrofit2.Call
import retrofit2.http.Body
import retrofit2.http.GET
import retrofit2.http.POST
import retrofit2.http.Query

interface DokterEP {
    @GET("dokter")
    fun getAll(@Query("user") user: String?): Call<Dokter>

    @POST("dokter/buy")
    fun buyChat(@Body data: HashMap<String, Any>): Call<ResponseEP>
}