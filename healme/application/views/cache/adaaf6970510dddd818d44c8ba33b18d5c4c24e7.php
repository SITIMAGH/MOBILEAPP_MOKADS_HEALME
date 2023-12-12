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
            overflow-y: auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            position: relative;
            background-color: #251e54;
        }

        /* .app::before {
            content: "";
            background: url('<?php echo e(base_url()); ?>assets/bg.jpeg') no-repeat;
            background-position: center;
            background-size: cover;
            opacity: .5;
            width: 100%;
            height: 100%;
            display: block;
            position: absolute;
            z-index: -1;
        } */

        .radiusfull{
            border-radius: 100px;
        }


        /* Mobile */
        @media(max-width: 765px) {
            .app {
                width: 100%;
                height: 100vh;
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                position: relative;
            }
        }
    </style>
    <title>Daftar | PONSEL KITA</title>
</head>

<body>

    <div class="app">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center" style="height: 100vh; width: 100%;">
                        <form action="<?php echo e(base_url()); ?>auth/do_daftar" method="POST" class="w-100">
                            <center><img
                                src="<?php echo e(base_url()); ?>assets/<?php echo e(json_decode(file_get_contents('assets/logo.json'))->image); ?>"
                                alt="" width="150" class="rounded-lg"></center>
                            <div class="form-group mt-3 mb-2">
                                
                                <input type="text" name="name" class="form-control radiusfull" placeholder="Fullname"
                                    required>
                            </div>
                            <div class="form-group mb-2">
                                
                                <input type="number" name="phone" class="form-control radiusfull"
                                    placeholder="Phone" required>
                            </div>
                            
                            <div class="form-group mb-2">
                                
                                <input type="password" name="password" class="form-control radiusfull"
                                    placeholder="Password" required>
                            </div>
                            <div class="form-group mb-2">
                                
                                <input type="text" name="reff" class="form-control radiusfull"
                                    value="<?php echo e(isset($_GET['invite']) ? $_GET['invite'] : ''); ?>"
                                    placeholder="Refferal">
                            </div>
                            <div class="form-group mb-2">
                                
                                <input type="number" name="pin" class="form-control radiusfull"
                                    placeholder="Pin" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="submit" value="Daftar" class="btn w-100 radiusfull text-light" style="background-color: #d920a1;">
                            </div>
                            <div class="text-center mt-2 text-light">Sudah Punya Akun? <a
                                    href="<?php echo e(base_url()); ?>auth/login" class="text-warning">Login</a></div>
                            
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
            formData.append('type', 'reg');

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

</html><?php /**PATH C:\newxampp2\htdocs\ponselkita\application\views/daftar.blade.php ENDPATH**/ ?>