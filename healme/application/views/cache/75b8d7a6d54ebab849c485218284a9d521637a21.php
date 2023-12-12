<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">

    <style>
        body {
            display: flex;
            justify-content: center;
            background-color: #dddddd37;
        }

        .app {
            width: 25%;
            height: 100vh;
            background-color: white;
            overflow-y: auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            position: relative;
        }


        /* Mobile */
        @media(max-width: 765px) {
            .app {
                width: 100%;
                height: 100vh;
                background-color: white;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                position: relative;
            }
        }
    </style>
    <title>Login | AK HOTELS</title>
</head>

<body>

    <div class="app">
        <div class="container">
            <div class="row ">
                <div class="col-12">
                    <div class="d-flex align-items-center" style="height: 100vh; width: 100%;">
                        <form action="<?php echo e(base_url()); ?>auth/do_login" method="POST" class="w-100">
                            <center><img
                                    src="<?php echo e(base_url()); ?>assets/<?php echo e(json_decode(file_get_contents('assets/logo.json'))->image); ?>"
                                    alt="" width="70"></center>
                            <div class="form-group mt-3 mb-2">
                                <input type="number" name="phone" class="form-control"
                                    placeholder="Phone, Exp : 08576272527272" required>
                            </div>
                            <div class="form-group mb-2 d-flex">
                                
                                <input type="number" name="otp" class="form-control mr-2" placeholder="OTP, Exp : 1234"
                                    required>
                                <button type="button" class="btn btn-primary"
                                    style="white-space: nowrap; font-size: 12px;" id="reqOtp">Request
                                    OTP</button>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password, Exp : john123"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn btn-warning w-100">
                            </div>
                            <div class="text-center mt-2">Belum Punya Akun? <a
                                    href="<?php echo e(base_url()); ?>auth/daftar">Daftar</a></div>
                            <div class="row justify-content-between mt-3">
                                <div class="col-6">
                                    <a href="LINK_APP_STORE" target="_blank"><img
                                            src="<?php echo e(base_url()); ?>assets/appstore.png" alt="" class="img-fluid"></a>
                                </div>
                                <div class="col-6">
                                    <a href="LINK_PLAY_STORE" target="_blank"><img
                                            src="<?php echo e(base_url()); ?>assets/playstore.png" alt="" class="img-fluid"></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
        integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo e(base_url()); ?>assets/main/js/chat.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->

    <script>
        $('#reqOtp').click(function(){
            if($('input[name=phone]').val() == ''){
                alert("Nomor telepon kosong");
                return;
            }
            const formData = new FormData();
            formData.append('phone', $('input[name=phone]').val());
            formData.append('type', 'log');

            axios.post('<?php echo e(base_url()); ?>auth/req_otp', formData)
            .then(res => {
                if(res.data.status == true){
                    Swal.fire({
                        icon: 'success',
                        text: 'Otp sedang dikirim',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }else{
                    Swal.fire({
                        icon: 'error',
                        text: 'Otp gagal dikirim'
                    })
                }
            }).catch(err => {
                alert(JSON.stringify(err));
            });
        });
    </script>

</body>

</html><?php /**PATH /home/akhotel1/public_html/application/views/login.blade.php ENDPATH**/ ?>