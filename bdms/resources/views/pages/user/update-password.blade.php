@extends('layouts.master')

@section('content')

    <div class="app-main__inner">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <i aria-hidden="true" class="fa fa-home"></i>
                                    <a href="/dashboard">Home</a>
                                </li>

                                <li class="active breadcrumb-item">
                                    <a href="{{ route('user.profile',[Auth::user()->id]) }}">My Account</a>
                                </li>

                                <li class="active breadcrumb-item">
                                    <a href="">Change Password</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">


            @if(Session::has('error'))
                <script>
                    setTimeout(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '{{ session()->get('error')}}',
                            footer: '<a href>Current Password you entered is invalid</a>'
                        })
                    }, 2000);
                </script>
            @endif


            <div class="card-body">
                <h5 class="card-title"></h5>
                <form id="signupForm" class="col-md-12 mx-auto" method="POST" action="{{ route('user.password-update') }}">
                    {{csrf_field()}}
                    {{method_field('POST')}}


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="oldPass">Old Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('oldPass') is-invalid @enderror" id="input-pwd" value="{{ old('oldPass') }}" name="oldPass" required />
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <span toggle="#input-pwd" class="fa fa-eye field-icon_1"></span>
                                </span>
                                </div>
                                @error('oldPass')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="input-pwd_2" value="{{ old('new_password') }}" name="new_password" required />
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <span toggle="#input-pwd_2" class="fa fa-eye field-icon_2" id="eye"></span>
                                </span>
                                </div>
                                @error('new_password')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" id="input-pwd_3" name="password_confirmation" required />
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <span toggle="#input-pwd_3" class="fa fa-eye field-icon_3"></span>
                                </span>
                                </div>
                                @error('password_confirmation')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group" align="right">
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".field-icon_1").on('click', function(event) {
                event.preventDefault();

                console.log("Clicked");
                let input = $($(this).attr('toggle'));
                console.log("Clicked " + input);

                if (input.attr('type') == 'password') {

                    input.attr('type', 'text');
                    $('.field-icon_1').addClass( "fa-eye-slash" );

                } else {

                    input.attr('type', 'password');
                    $('.field-icon_1').removeClass( "fa-eye-slash" );
                }
            });

            $(".field-icon_2").on('click', function(event) {
                event.preventDefault();

                console.log("Clicked");
                let input = $($(this).attr('toggle'));
                console.log("Clicked " + input);

                if (input.attr('type') == 'password') {

                    input.attr('type', 'text');
                    $('.field-icon_2').addClass( "fa-eye-slash" );

                } else {

                    input.attr('type', 'password');
                    $('.field-icon_2').removeClass( "fa-eye-slash" );
                }
            });

            $(".field-icon_3").on('click', function(event) {
                event.preventDefault();
                console.log("Clicked");

                let input = $($(this).attr('toggle'));
                console.log("Clicked " + input);

                if (input.attr('type') == 'password') {

                    input.attr('type', 'text');
                    $('.field-icon_3').addClass( "fa-eye-slash" );

                } else {

                    input.attr('type', 'password');
                    $('.field-icon_3').removeClass( "fa-eye-slash" );
                }
            });
        });
    </script>

@endsection
