package com.healme.home

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

class DetailArticleActivity: AppCompatActivity() {
    lateinit var toolbar: Toolbar
    lateinit var img: ImageView
    lateinit var title: TextView
    lateinit var date: TextView
    lateinit var content: TextView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activty_detailartikel)
        toolbar = findViewById(R.id.toolbar)
        setSupportActionBar(toolbar)
        img = findViewById(R.id.iv_img_detailartikel)
        title = findViewById(R.id.tv_title_detailartikel)
        date = findViewById(R.id.tv_date_detailartikel)
        content = findViewById(R.id.tv_content_detailartikel)

        var data: Artikel.Data = Gson().fromJson(intent.getStringExtra("data"), Artikel.Data::class.java)
        Glide.with(this).load("${ServerApp.baseURL}files/${data.image}").into(img)
        title.text = data.title
        date.text = data.created_at
        content.text = if(Build.VERSION.SDK_INT >= Build.VERSION_CODES.N){
            Html.fromHtml(data.content, Html.FROM_HTML_MODE_COMPACT)
        }else{
            Html.fromHtml(data.content)
        }
    }
}