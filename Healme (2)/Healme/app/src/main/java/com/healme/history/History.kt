package com.healme.history

data class History (
    val status: String,
    val data: ArrayList<Data>
){
    data class Data(
        var trxID        : String? = null,
        var id           : String? = null,
        var code         : String? = null,
        var total        : String? = null,
        var type         : String? = null,
        var user_id       : String? = null,
        var proof_img     : String? = null,
        var shipment_type : String? = null,
        var address      : String? = null,
        var note         : String? = null,
        var status       : String? = null,
        var created_at    : String? = null,
        var name         : String? = null,
        var phone        : String? = null,
        var google_auth   : String? = null,
        var title        : String? = null,
        var image        : String? = null,
        var password     : String? = null,
        var price        : String? = null,
        var age          : String? = null,
        var role         : String? = null
    )
}