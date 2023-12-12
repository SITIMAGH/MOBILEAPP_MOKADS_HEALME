package com.healme.obat

data class Obat(
    val status: String,
    val data: ArrayList<Data>
){
    data class Data(
        val id: String,
        val name: String,
        val price: String,
        val description: String,
        val image: String
    )
}