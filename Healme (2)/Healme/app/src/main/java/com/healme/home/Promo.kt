package com.healme.home

data class Promo (val status: String, val data: ArrayList<Data>){
    data class Data(val id: String, val image: String)
}