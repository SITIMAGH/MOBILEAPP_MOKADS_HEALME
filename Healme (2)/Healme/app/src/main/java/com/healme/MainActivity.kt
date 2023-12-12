package com.healme

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.Menu
import android.view.MenuItem
import androidx.appcompat.widget.Toolbar
import androidx.fragment.app.Fragment
import com.google.android.material.bottomnavigation.BottomNavigationView
import com.healme.history.HistoryFragment
import com.healme.home.HomeFragment
import com.healme.profile.ProfileFragment
import com.healme.utils.Session

class MainActivity : AppCompatActivity(), BottomNavigationView.OnNavigationItemSelectedListener {
    lateinit var toolbar: Toolbar;
    lateinit var navigation: BottomNavigationView
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)
        toolbar = findViewById(R.id.toolbar)
        setSupportActionBar(toolbar)
        navigation = findViewById(R.id.navigation)
        navigation.setOnNavigationItemSelectedListener(this)

        setFragment(HomeFragment())
    }

    override fun onNavigationItemSelected(item: MenuItem): Boolean {
        var f: Fragment? = null
        when(item.itemId){
            R.id.home -> {
                f = HomeFragment()
            }
            R.id.history -> {
                f = HistoryFragment()
            }
            R.id.profile -> {
                f = ProfileFragment()
            }
        }
        return setFragment(f!!)
    }

    private fun setFragment(f: Fragment): Boolean{
        if(f != null){
            supportFragmentManager
                .beginTransaction()
                .replace(R.id.frame, f)
                .commit()
            return true
        }
        return false
    }

    override fun onCreateOptionsMenu(menu: Menu?): Boolean {
        menuInflater.inflate(R.menu.toolbars, menu)
        return true
    }

    override fun onOptionsItemSelected(item: MenuItem): Boolean {
        when(item.itemId){
            R.id.logout -> {
                Session(this).reset()
                startActivity(Intent(this, LoginActivity::class.java))
                finish()
                return true
            }
            else -> {
                return super.onOptionsItemSelected(item)
            }
        }
    }
}