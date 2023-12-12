package com.healme.janji

import androidx.fragment.app.Fragment
import androidx.fragment.app.FragmentManager
import androidx.fragment.app.FragmentPagerAdapter

class VPAdapter(fm: FragmentManager, var tabCount: Int): FragmentPagerAdapter(fm) {

    override fun getCount(): Int = tabCount

    override fun getItem(position: Int): Fragment {
        var f: Fragment? = null
        when(position){
            0 -> {
                f = DokterFragment()
            }
            1 -> {
                f = InformationFragment()
            }
        }
        return f!!
    }

}