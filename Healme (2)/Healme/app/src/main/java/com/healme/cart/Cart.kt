package com.healme.cart

data class Cart(
    val id: String,
    val name: String,
    val price: String,
    var qty: String,
    val img: String
)