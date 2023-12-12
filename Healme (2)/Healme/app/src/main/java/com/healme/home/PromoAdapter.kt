package com.healme.home

import android.content.Context
import android.util.Log
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import androidx.viewpager.widget.PagerAdapter
import com.bumptech.glide.Glide
import com.healme.R
import com.healme.utils.ServerApp

class PromoAdapter(var context: Context, var img: ArrayList<Promo.Data>) : PagerAdapter() {

    override fun getCount(): Int = img.size

    override fun isViewFromObject(view: View, `object`: Any): Boolean = view == `object`

    override fun instantiateItem(container: ViewGroup, position: Int): Any {
        var v = LayoutInflater.from(context).inflate(R.layout.item_promo, container, false)
        var imgSlide: ImageView = v.findViewById(R.id.iv_img_itempromo)
        Glide.with(context).load("${ServerApp.baseURL}files/${img[position].image}").into(imgSlide)
        container.addView(v)
        return v;
    }

    override fun destroyItem(container: ViewGroup, position: Int, `object`: Any) {
        container.removeView(`object` as View)
    }

}