package com.healme.utils.endpoint

import com.healme.profile.Profile
import retrofit2.Call
import retrofit2.http.Body
import retrofit2.http.GET
import retrofit2.http.POST
import retrofit2.http.Path

interface ProfileEP {
    @GET("profile/user/{userId}")
    fun get(@Path("userId") userId: String): Call<Profile>

    @POST("profile/update/{userId}")
    fun update(@Path("userId") userId: String, @Body data: HashMap<String, Any>): Call<ResponseEP>
}