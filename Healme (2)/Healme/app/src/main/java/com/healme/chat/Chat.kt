package com.healme.chat

data class Chat(
    val status: String,
    val data: ArrayList<Data>
){
    data class Data(
        val id: String,
        val name: String,
        val phone: String,
        val google_auth: String,
        val title: String,
        val image: String,
        val password: String,
        val price: String,
        val age: String,
        val role: String,
        val created_at: String,
        val isPay: String
    )
}