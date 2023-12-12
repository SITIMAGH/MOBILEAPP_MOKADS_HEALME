package com.healme.chat
data class Roomchat(
    val status: String,
    val token: String? = null,
    val chat_id: String?= null,
    val data: ArrayList<Data>
){
    data class Data(
        var id        : String? = null,
        var chat_id    : String? = null,
        var from_id    : String? = null,
        var to_id      : String? = null,
        var message   : String? = null,
        var created_at : String? = null,
        var token     : String? = null
    )
}