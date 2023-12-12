package com.healme.profile

data class Profile (
    val status: String,
    val data: Data
){
    data class Data(
        var id         : String? = null,
        var name       : String? = null,
        var phone      : String? = null,
        var google_auth : String? = null,
        var title      : String? = null,
        var image      : String? = null,
        var password   : String? = null,
        var price      : String? = null,
        var age        : String? = null,
        var role       : String? = null,
        var created_at  : String? = null
    )
}