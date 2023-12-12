package com.healme.home

data class Artikel (val status: String, val data: ArrayList<Data>){
    data class Data(val id: String, val title: String, val content: String, val image: String, val created_at: String)
}