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
                <div>Edit User
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form id="signupForm" class="col-md-12 mx-auto" method="POST" action="{{ route('user.update',[$user->id] ) }}" enctype="multipart/form-data">
                {{csrf_field()}}
                {!! method_field('PUT') !!}

                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <div>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Username" value="{{ $user->name }}" />
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
                                        <input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" placeholder="Mobile" maxlength="10" minlength="10" value="{{ $user->mobile }}" />
                                        @error('mobile')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role') }}">

                                        @foreach($role as $row)
                                        <option {{ $user -> role == $row->id ? "selected" : ""}} value="{{$row->id}}">{{$row->role}}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="code">Email</label>
                                    <div>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $user->email }}" />
                                        @error('email')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mobile">Password</label>
                                    <div>
                                        <input type="password" class="form-control" name="password" placeholder="password" value="{{ old('password') }}" />
                                        @error('password')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" align="right">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success">Save</button>
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
