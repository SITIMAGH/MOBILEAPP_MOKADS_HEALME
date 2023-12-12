package com.healme.utils.endpoint

import com.healme.home.Artikel
import retrofit2.Call
import retrofit2.http.GET

interface ArtikelEP {
    @GET("artikel")
    fun getAll(): Call<Artikel>
}