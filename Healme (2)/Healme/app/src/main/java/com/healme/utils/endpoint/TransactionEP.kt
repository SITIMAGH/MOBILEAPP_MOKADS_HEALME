package com.healme.utils.endpoint

import com.healme.history.DetailTransaction
import com.healme.history.History
import okhttp3.MultipartBody
import retrofit2.Call
import retrofit2.http.GET
import retrofit2.http.Multipart
import retrofit2.http.POST
import retrofit2.http.Part
import retrofit2.http.Path

interface TransactionEP {
    @GET("transaction/user/{user_id}")
    fun getAll(@Path("user_id") userId: String): Call<History>

    @GET("transaction/detail/{user_id}/{trx_id}/{type}")
    fun getDetail(@Path("user_id") userId: String, @Path("trx_id") trxId: String, @Path("type") type: String): Call<DetailTransaction>

    @Multipart
    @POST("transaction/proof/{user_id}/{trx_id}/{type}")
    fun uploadProof(@Path("user_id") userId: String, @Path("trx_id") trxId: String, @Path("type") type: String, @Part body: MultipartBody.Part): Call<ResponseEP>

}