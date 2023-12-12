package com.healme.janji

import android.os.Bundle
import androidx.appcompat.app.AppCompatActivity
import androidx.appcompat.widget.Toolbar
import androidx.viewpager.widget.ViewPager
import androidx.viewpager.widget.ViewPager.OnPageChangeListener
import com.google.android.material.tabs.TabLayout
import com.google.android.material.tabs.TabLayout.OnTabSelectedListener
import com.healme.R

class JanjiActivity: AppCompatActivity() {
    lateinit var toolbar: Toolbar
    lateinit var tb: TabLayout
    lateinit var vp: ViewPager
    lateinit var vpAdapter: VPAdapter
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_janji)
        toolbar = findViewById(R.id.toolbar)
        setSupportActionBar(toolbar)
        tb = findViewById(R.id.tl_menu_janji)
        tb.addTab(tb.newTab().setText("Buat Janji"))
        tb.addTab(tb.newTab().setText("Informasi"))
        vpAdapter = VPAdapter(supportFragmentManager, tb.tabCount)
        vp = findViewById(R.id.vp_content_janji)
        vp.adapter = vpAdapter
        vp.addOnPageChangeListener(TabLayout.TabLayoutOnPageChangeListener(tb))
        tb.addOnTabSelectedListener(object : OnTabSelectedListener{
            override fun onTabSelected(tab: TabLayout.Tab?) {
                vp.currentItem = tab!!.position
            }

            override fun onTabUnselected(tab: TabLayout.Tab?) {

            }

            override fun onTabReselected(tab: TabLayout.Tab?) {

            }

        })
    }
}