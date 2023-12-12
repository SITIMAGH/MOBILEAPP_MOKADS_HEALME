package com.healme.subscribe

data class Subscribe(
    val status: String,
    val data: ArrayList<Data>
){
    data class Data(
        val id: String,
        val name: String,
        val price: String,
        val discon: String,
        val time: String,
        var isPay: String?
    )
}