package com.healme.history

data class DetailTransaction(
    val status: String,
    val data: History.Data,
    val chat: ArrayList<Chat>,
    val voucher: ArrayList<Voucher>,
    val obat: ArrayList<Obat>
){
    data class Chat(
        var trxId        : String? = null,
        var trxchatId    : String? = null,
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
        var trx_id        : String? = null,
        var dokter_id     : String? = null,
        var price        : String? = null,
        var userName     : String? = null,
        var dokterName   : String? = null
    )

    data class Voucher(
        var trxId        : String? = null,
        var trxvocId     : String? = null,
        var userName     : String? = null,
        var vocName      : String? = null,
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
        var trx_id        : String? = null,
        var voucher_id    : String? = null,
        var price        : String? = null,
        var expired_at    : String? = null,
        var name         : String? = null,
        var phone        : String? = null,
        var google_auth   : String? = null,
        var title        : String? = null,
        var image        : String? = null,
        var password     : String? = null,
        var age          : String? = null,
        var role         : String? = null,
        var discon       : String? = null,
        var time         : String? = null
    )

    data class Obat(
        var id          : String? = null,
        var trxId       : String? = null,
        var obatId      : String? = null,
        var price       : String? = null,
        var qty         : String? = null,
        var total       : String? = null,
        var name        : String? = null,
        var description : String? = null,
        var image       : String? = null
    )
}