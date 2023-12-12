package com

import com.healme.profile.Profile

data class Auth (
    val status: String,
    val data: Profile.Data,
    val msg: String
    )