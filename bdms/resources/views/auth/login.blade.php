<!doctype html>
<html lang="en">
<head>
    <title>The BOOK</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="{{ asset('../assets/login-form-20/css/style.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


</head>
<body class="img js-fullheight"
      style="background-image: url(https://images.unsplash.com/photo-1549122728-f519709caa9c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8MTZ8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60);">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section"></h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">The BOOK</h3>
                    @if(Session::has('message'))
                        <script>
                            setTimeout(function () {
                                Swal.fire(
                                    'Success',
                                    '{{ session()->get('message')}}',
                                    'success'
                                )
                            }, 2000);
                        </script>
                    @endif
                    <form method="POST" action="{{ route('login') }}" class="signin-form">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password" name="password" class="form-control"
                                   placeholder="Password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>


                        @error('email')
                        <div class="alert alert-danger alert-dismissible fade show">
                            <strong>Login Failed!</strong>{{ $message }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'OOPS...',
                                text: 'These credentials do not match our records!',
                                footer: '<strong>LOGIN FAILED</strong>'
                            })
                        </script>
                        @enderror


                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary">Remember Me
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="#" style="color: #fff">Forgot Password</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset ('../assets/login-form-20/js/jquery.min.js') }}"></script>
<script src="{{ asset ('../assets/login-form-20/js/popper.js') }}"></script>
<script src="{{ asset ('../assets/login-form-20/js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('../assets/login-form-20/js/main.js') }}"></script>

</body>
</html>

