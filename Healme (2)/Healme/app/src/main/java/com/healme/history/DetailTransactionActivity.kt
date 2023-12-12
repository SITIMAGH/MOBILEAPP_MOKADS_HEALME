package com.healme.history

import android.app.Activity
import android.content.Context
import android.net.Uri
import android.os.Bundle
import android.os.Environment
import android.util.Log
import android.view.View
import android.widget.Button
import android.widget.ImageView
import android.widget.Toast
import androidx.activity.result.contract.ActivityResultContracts
import androidx.appcompat.app.AppCompatActivity
import androidx.lifecycle.lifecycleScope
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.github.drjacky.imagepicker.ImagePicker
import com.github.drjacky.imagepicker.constant.ImageProvider
import com.healme.R
import com.healme.utils.ServerApp
import com.healme.utils.endpoint.ResponseEP
import com.healme.utils.endpoint.TransactionEP
import kotlinx.coroutines.launch
import okhttp3.MediaType
import okhttp3.MultipartBody
import okhttp3.RequestBody
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response
import java.io.File
import java.io.FileOutputStream
import java.io.IOException
import java.io.InputStream

class DetailTransactionActivity: AppCompatActivity() {
    lateinit var rv: RecyclerView
    lateinit var img: ImageView
    lateinit var btn: Button
    lateinit var detailHistoryAdapter: DetailHistoryAdapter

    lateinit var TRANSACTIONEP: TransactionEP
    var files: File? = null
    var detailTransaction: DetailTransaction? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_detailtransaction)
        rv = findViewById(R.id.rv_list_detailtransaction)
        img = findViewById(R.id.iv_bukti_detailtransaction)
        btn = findViewById(R.id.btn_upload_detailtransaction)

        rv.layoutManager = LinearLayoutManager(this)
        rv.setHasFixedSize(true)
        detailHistoryAdapter = DetailHistoryAdapter()
        rv.adapter = detailHistoryAdapter

        TRANSACTIONEP = ServerApp.init().create(TransactionEP::class.java)
        TRANSACTIONEP.getDetail("1", intent.getStringExtra("id").toString(), intent.getStringExtra("type").toString())
            .enqueue(object : Callback<DetailTransaction>{
                override fun onResponse(
                    call: Call<DetailTransaction>,
                    response: Response<DetailTransaction>
                ) {
                    if(response.body()!!.status.equals("200")){
                        detailHistoryAdapter.Update(response.body()!!)
                        detailTransaction = response.body()
                        if(response.body()!!.data.proof_img == null){
                            btn.visibility = View.VISIBLE
                        }else{
                            btn.visibility = View.INVISIBLE
                        }
                    }else{
                        Toast.makeText(applicationContext, "KOSONG", Toast.LENGTH_LONG).show()
                    }
                }

                override fun onFailure(call: Call<DetailTransaction>, t: Throwable) {
                    Toast.makeText(applicationContext, t.localizedMessage.toString(), Toast.LENGTH_LONG).show()
                }
            })

        val launcher = registerForActivityResult(ActivityResultContracts.StartActivityForResult()) {
                if (it.resultCode == Activity.RESULT_OK) {
                    val uri = it.data?.data!!

                    contentResolver.openInputStream(uri)?.use { inputStream ->
                        // STEP 1: Create a tempFile for storing the image from scoped storage.
                        val tempFile = createTempFile(this, "fileName", "jpg")
                        // STEP 2: copy inputStream into the tempFile
                        copyStreamToFile(inputStream, tempFile)
                        // STEP 3: get file path from tempFile for further upload process.

                        files = File(tempFile.absolutePath)
                        img.setImageURI(Uri.fromFile(files))
                    }
                }
            }

        img.setOnClickListener {
            Log.d("YAI", detailTransaction!!.data.proof_img.toString())
            if(detailTransaction!!.data.proof_img == null){
                ImagePicker.with(this)
                    .provider(ImageProvider.BOTH) //Or bothCameraGallery()
                    .createIntentFromDialog { launcher.launch(it) }
            }else{
                Glide.with(this).load("${ServerApp.baseURL}files/${detailTransaction!!.data.proof_img}").into(img)
            }
        }

        btn.setOnClickListener {
            uploadFile(files!!)
        }
    }

    fun uploadFile(filer: File){

        lifecycleScope.launch {
            val request = RequestBody.create(MediaType.parse("image/*"), filer)
            val filePart = MultipartBody.Part.createFormData(
                "image",
                "proof.jpg",
                request
            )
            try {
                TRANSACTIONEP.uploadProof("1", intent.getStringExtra("id").toString(), intent.getStringExtra("type").toString(), filePart)
                    .enqueue(object : Callback<ResponseEP>{
                        override fun onResponse(
                            call: Call<ResponseEP>,
                            response: Response<ResponseEP>
                        ) {
                            finish()
                            Toast.makeText(applicationContext, "SUKSES", Toast.LENGTH_LONG).show()
                        }

                        override fun onFailure(call: Call<ResponseEP>, t: Throwable) {
                            Toast.makeText(applicationContext, t.localizedMessage.toString(), Toast.LENGTH_LONG).show()
                        }

                    })
            }catch (e: Exception){
                Toast.makeText(applicationContext, "ERROR", Toast.LENGTH_LONG).show()
                return@launch
            }
        }
    }

    @Throws(IOException::class)
    fun createTempFile(context: Context, fileName: String?, extension: String?): File {
        val storageDir: File? = context.getExternalFilesDir(Environment.DIRECTORY_DOCUMENTS)
        return File(storageDir, "$fileName.$extension")
    }

    fun copyStreamToFile(inputStream: InputStream, outputFile: File) {
        inputStream.use { input ->
            val outputStream = FileOutputStream(outputFile)
            outputStream.use { output ->
                val buffer = ByteArray(4 * 1024) // buffer size
                while (true) {
                    val byteCount = input.read(buffer)
                    if (byteCount < 0) break
                    output.write(buffer, 0, byteCount)
                }
                output.flush()
            }
        }
    }

}