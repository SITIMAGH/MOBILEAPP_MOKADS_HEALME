package com.healme.utils.endpoint

import com.healme.subscribe.Subscribe
import retrofit2.Call
import retrofit2.http.Body
import retrofit2.http.GET
import retrofit2.http.POST
import retrofit2.http.Query

interface VoucherEP {
    @GET("voucher")
    fun getAll(@Query("user") user: String?): Call<Subscribe>

    @POST("voucher/buy")
    fun buy(@Body data: HashMap<String, Any>): Call<ResponseEP>
}