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
                <div>Add Subject
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
                                    <label for="Code">Code</label>
                                    <div>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="Code" required name="Code" placeholder="Subject Code" value="{{ old('code') }}" />
                                        @error('code')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject">Name</label>
                                    <div>
                                        <input type="text" required class="form-control @error('mobile') is-invalid @enderror" id="subject" name="subject" placeholder="Subject name" value="{{ old('name') }}" />
                                        @error('subject')
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
@endsection