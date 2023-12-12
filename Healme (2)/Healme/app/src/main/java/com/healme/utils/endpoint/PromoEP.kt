package com.healme.utils.endpoint

import com.healme.home.Promo
import retrofit2.Call
import retrofit2.http.GET

interface PromoEP {
    @GET("promo")
    fun getAll(): Call<Promo>
}