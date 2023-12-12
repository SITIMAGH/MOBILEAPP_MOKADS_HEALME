package com.healme.dokter

import com.healme.chat.Roomchat
import com.healme.profile.Profile


data class DokterChat(
    val status: String,
    val data: ArrayList<Data>
){
    data class Data(
        val user: Profile.Data,
        val chat: ArrayList<Roomchat.Data>
    )
}