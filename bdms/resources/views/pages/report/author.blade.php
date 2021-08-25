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
                <div>Author wise Report
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form id="signupForm" class="col-md-12 mx-auto" method="POST" action="">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div>
                                        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" required name="author" placeholder="Author Name" value="{{ old('author') }}" />
                                        @error('author')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div>
                                    <button type="reset" class="btn btn-success">Search</button>                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection