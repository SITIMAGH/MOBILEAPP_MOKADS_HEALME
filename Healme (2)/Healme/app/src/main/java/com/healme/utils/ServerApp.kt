package com.healme.utils

import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory

object ServerApp {
    val baseURL = "https://35eb-202-80-214-182.ngrok-free.app/healme/"
    val apiURL = "${baseURL}api/"

    fun init(): Retrofit{
        return Retrofit.Builder()
            .baseUrl(apiURL)
            .addConverterFactory(GsonConverterFactory.create())
            .build()
    }
}