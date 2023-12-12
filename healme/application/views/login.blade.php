<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Login | HEALME</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ base_url() }}assets/adminui/css/simplebar.css">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ base_url() }}assets/adminui/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ base_url() }}assets/adminui/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ base_url() }}assets/adminui/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="{{ base_url() }}assets/adminui/css/app-dark.css" id="darkTheme" disabled>
</head>

<body class="light">
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form action="{{ base_url() }}auth/do_login" method="POST" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                    {{-- <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                        xml:space="preserve">
                        <g>
                            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                        </g>
                    </svg> --}}
                    <img src="" alt="" width="70">
                </a>
                <h1 class="h6 mb-3">Sign in</h1>
                <div class="form-group">
                    <label for="inputEmail" class="sr-only">Email</label>
                    <input type="email" id="inputEmail" name="email" class="form-control form-control-lg" placeholder="Email address"
                        required="" autofocus="">
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control form-control-lg"
                        placeholder="Password" required="">
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Stay logged in </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Let me in</button>
                <p class="mt-5 mb-3 text-muted">© 2020</p>
            </form>
        </div>
    </div>
    <script src="{{ base_url() }}assets/adminui/js/jquery.min.js"></script>
    <script src="{{ base_url() }}assets/adminui/js/popper.min.js"></script>
    <script src="{{ base_url() }}assets/adminui/js/moment.min.js"></script>
    <script src="{{ base_url() }}assets/adminui/js/bootstrap.min.js"></script>
    <script src="{{ base_url() }}assets/adminui/js/simplebar.min.js"></script>
    <script src='{{ base_url() }}assets/adminui/js/daterangepicker.js'></script>
    <script src='{{ base_url() }}assets/adminui/js/jquery.stickOnScroll.js'></script>
    <script src="{{ base_url() }}assets/adminui/js/tinycolor-min.js"></script>
    <script src="{{ base_url() }}assets/adminui/js/config.js"></script>
    <script src="{{ base_url() }}assets/adminui/js/apps.js"></script>
</body>

</html>
</body>

</html>