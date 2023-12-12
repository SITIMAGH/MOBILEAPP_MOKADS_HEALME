package com.healme.utils

import okhttp3.MediaType
import okhttp3.RequestBody
import okio.BufferedSink
import java.io.InputStream

class UploadStreamRequestBody(
    private val mediaType: String,
    private val inputStream: InputStream,
    private val onUploadProgress: (Int) -> Unit
) : RequestBody() {

    override fun contentLength(): Long = inputStream.available().toLong()

    override fun contentType(): MediaType? = MediaType.parse(mediaType)

    override fun writeTo(sink: BufferedSink) {
        val contentLength = inputStream.available().toFloat()
        val buffer = ByteArray(DEFAULT_BUFFER_SIZE)
        inputStream.use { ipt ->
            var uploaded = 0
            var read: Int
            while (ipt.read(buffer).also { read = it } != -1){
                sink.write(buffer, 0, read)
                uploaded += read
                onUploadProgress((100*uploaded/contentLength).toInt())
            }
        }
    }

}