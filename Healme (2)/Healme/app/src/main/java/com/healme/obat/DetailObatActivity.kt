package com.healme.obat

import android.os.Build
import android.os.Bundle
import android.text.Html
import android.widget.ImageView
import android.widget.TextView
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.Toolbar
import com.bumptech.glide.Glide
import com.google.gson.Gson
import com.healme.R
import com.healme.utils.ServerApp

class DetailObatActivity: AppCompatActivity() {
    lateinit var toolbar: Toolbar
    lateinit var img: ImageView
    lateinit var name: TextView
    lateinit var price: TextView
    lateinit var description: TextView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detailobat)
        toolbar = findViewById(R.id.toolbar)
        setSupportActionBar(toolbar)
        img = findViewById(R.id.iv_img_detailobat)
        name = findViewById(R.id.tv_name_detailobat)
        price = findViewById(R.id.tv_price_detailobat)
        description = findViewById(R.id.tv_description_detailobat)

        var data: Obat.Data = Gson().fromJson(intent.getStringExtra("data"), Obat.Data::class.java)
        Glide.with(this).load("${ServerApp.baseURL}files/${data.image}").into(img)
        name.text = data.name
        price.text = "Rp ${data.price}"
        description.text = if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.N){
            Html.fromHtml(data.description, Html.FROM_HTML_MODE_COMPACT)
        }else{
            Html.fromHtml(data.description)
        }
    }
}