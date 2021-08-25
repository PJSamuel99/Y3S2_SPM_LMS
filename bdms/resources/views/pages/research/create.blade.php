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
                <div>Add Rearch Paper
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form id="signupForm" class="col-md-12 mx-auto" method="POST" action="" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Code</label>
                                    <div>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="Code" required name="Code" placeholder="Research Code" value="{{ old('code') }}" />
                                        @error('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <div>
                                        <input type="text" required class="form-control @error('mobile') is-invalid @enderror" id="name" name="name" placeholder="Research Paper Name" value="{{ old('name') }}" />
                                        @error('mobile')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" required class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}">
                                        <option value="Please select" selected disabled>Please Select</option>

                                        <option value="Science">Science</option>
                                        <option value="Maths">Maths</option>
                                        <option value="English">English</option>
                                        <option value="History">History</option>


                                    </select>
                                    @error('category')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="paper">Research Paper</label>
                                    <input type="file" class="form-control" name="paper" value="{{ old('paper') }}" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code">Date</label>
                                    <div>
                                        <input type="date" required class="form-control @error('date') is-invalid @enderror" id="date" name="date" placeholder="Date" value="{{ old('date') }}" />
                                        @error('date')
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