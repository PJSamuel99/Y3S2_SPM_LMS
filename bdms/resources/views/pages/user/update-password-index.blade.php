@extends('layouts.master')
@section('content')

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-culture icon-gradient bg-tempting-azure">
                        </i>
                    </div>
                    <div>{{ $user->name }}
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">


            @if(Session::has('msg'))
                <script>
                    setTimeout(function() {
                        Swal.fire(
                            'Success',
                            '{{ session()->get('msg')}}',
                            'success'
                        )
                    }, 2000);
                </script>
            @endif


            <div class="card-body">
                <h5 class="card-title"></h5>
                <form id="signupForm" class="col-md-12 mx-auto" method="POST" action="{{ route('user.profile-update',[$user->id] ) }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {!! method_field('POST') !!}

                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <div>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Username" value="{{ $user->name }}" required/>
                                            @error('name')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="code">Mobile</label>
                                        <div>
                                            <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="Mobile" maxlength="10" minlength="10" value="{{ $user->mobile }}" required/>
                                            @error('mobile')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <div>
                                            <input type="text" class="form-control" id="role" name="role" placeholder="Mobile"  value="{{ $role[0]->role }}" readonly/>

                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="code">Profile Picture</label>
                                        <input type="file" class="form-control" name="dp"/>
                                        <img id="previewImg" src="{{ URL::asset('images/'.$user->dp) }}" style="width:27%;">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="code">Email</label>
                                        <div>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $user->email }}" required />
                                            @error('email')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" align="left">
                                        <a href="{{ route('user.update-password')}}" class="btn" name="btn"><i class="material-icons" data-toggle="tooltip" title="Edit" style="color: #4261f9;">&#xE254;</i>Change Password</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" align="right">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>

@endsection
