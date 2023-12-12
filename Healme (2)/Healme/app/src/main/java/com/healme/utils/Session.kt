package com.healme.utils

import android.content.Context
import android.content.SharedPreferences
import com.google.gson.Gson
import com.healme.profile.Profile

class Session(context: Context) {

    private val SESSION_AUTH = "session_auth"
    private val pref: SharedPreferences = context.getSharedPreferences(SESSION_AUTH, Context.MODE_PRIVATE)

    fun load(): Profile.Data {
        return Gson().fromJson(pref.getString("data", null).toString(), Profile.Data::class.java)
    }

    fun save(data: Profile.Data): Boolean = pref.edit().putString("data", Gson().toJson(data).toString()).commit()

    fun reset(): Boolean = pref.edit().remove("data").commit()

    fun isLoged(): Boolean = pref.getString("data", null) != null

}