@extends('layouts.master')
@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                            <i class="pe-7s-users icon-gradient bg-tempting-azure">
                    </i>
                </div>
                <div>Subject
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a title="Add New" href="{{ URL::to('subject/create') }}" class="btn-shadow mr-3 btn btn-dark search-btn show-loader">
                    <i class="fa fa-plus text-white"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card">

        <div class="card-body">
            @if (\Session::has('msg'))
            <div class="alert alert-success fade-message">
                <p>{{ \Session::get('msg') }}</p>
            </div><br />

            <script>
                $(function() {
                    setTimeout(function() {
                        $('.fade-message').slideUp();
                    }, 2500);
                });
            </script>
            @endif

                @if (\Session::has('msg-info'))
                    <div class="alert alert-info fade-message">
                        <p>{{ \Session::get('msg-info') }}</p>
                    </div><br />

                    <script>
                        $(function() {
                            setTimeout(function() {
                                $('.fade-message').slideUp();
                            }, 2500);
                        });
                    </script>
                @endif
            <table class="mb-0 table rwd-table table table-striped table table-hover" id="page-data-table">
                <thead style="background-color:#a6d7ff">
                    <tr>

                        <th>Code</th>
                        <th>Name</th>
                        <th width="100">Actions</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <tr>

                      
                        <td data-th="Code">SUB001</td>
                        <td data-th="Name">Software Engineering</td>
                        <td data-th="Actions" width="100">

{{--                            <a href="#" id="view" class="viewBtn"  data-name="{{ $row -> name }}" data-email="{{ $row->email}}" data-mobile="{{ $row->mobile}}" data-role="{{ $row->role}}" data-dp="{{ $row->dp}}" ><i class="material-icons" style="color: #13acff;">&#xe8f4;</i></a>--}}
                            <a href="" class="editbtn" name="editbtn"><i class="material-icons" data-toggle="tooltip" title="Edit" style="color: #4261f9;">&#xE254;</i></a>
                            <a href="#"  class="delete deletebtn"><i class="material-icons" data-toggle="tooltip" title="Delete" style="color: red;">&#xE872;</i></a>
                        </td>
                    </tr>
                  
                </tbody>
            </table>
                <div class="float-right">
                   
                </div>
            <div class="float-left">
                <small></small>
            </div>
        </div>
    </div>
</div>

@section('modals')

    <div class="modal fade bd-example-modal-sm" id="userViewModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title custom-user">Users</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="main-card mb-3 card">

                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="username">Name</label>
                                                <div>
                                                    <input type="text" class="form-control" id="username" name="username" readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <div>
                                                    <input type="text" class="form-control" id="email" name="email" readonly />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mobile">Mobile Number</label>
                                                <div>
                                                    <input type="text" class="form-control" id="mobile" name="mobile" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <div>
                                                    <input type="text" class="form-control" id="role" name="role" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



@endsection

@endsection