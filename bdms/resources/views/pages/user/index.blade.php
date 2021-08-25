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
                <div>Users
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a title="Add New" href="{{ URL::to('user/create') }}" class="btn-shadow mr-3 btn btn-dark search-btn show-loader">
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

                        <th>DP</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Role</th>
                        <th width="100">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $row)
                    <tr>

                        <td data-th="DP"> <img src="{{url('images/'.$row->dp)}}" class="img_thumbnail custom-img"  height="75"  width="75"> </td>
                        <td data-th="Name">{{$row->name}}</td>
                        <td data-th="Email">{{$row->email}}</td>
                        <td data-th="Mobile">{{$row->mobile}}</td>
                        <td data-th="Role">{{$row->rle}}</td>
                        <td data-th="Actions" width="100">

{{--                            <a href="#" id="view" class="viewBtn"  data-name="{{ $row -> name }}" data-email="{{ $row->email}}" data-mobile="{{ $row->mobile}}" data-role="{{ $row->role}}" data-dp="{{ $row->dp}}" ><i class="material-icons" style="color: #13acff;">&#xe8f4;</i></a>--}}
                            <a href="{{ URL::to('user/' .$row->id. '/edit') }}" class="editbtn" name="editbtn"><i class="material-icons" data-toggle="tooltip" title="Edit" style="color: #4261f9;">&#xE254;</i></a>
                            <a href="#" data-id="{{$row->id}}" class="delete deletebtn"><i class="material-icons" data-toggle="tooltip" title="Delete" style="color: red;">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
                <div class="float-right">
                    {{ $user->appends(request()->query()) }}
                </div>
            <div class="float-left">
                <small> <b>Records : {{ $user->firstItem() }} - {{ $user->lastItem() }} of {{ $user->total() }}</b></small>
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



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(event) {

        $(".deletebtn").click(function(event) {
            event.preventDefault();
            var current_object = $(this);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then(result => {
                if (result.isConfirmed) {
                    var id = current_object.attr("data-id");
                    console.log("id " + id);

                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "DELETE",
                        url: "/user/" + id,
                        data: {
                            _token: CSRF_TOKEN,
                            id: id,
                        },
                        dataType: "JSON",
                        success: function(response) {
                            console.log("Response " + response);
                            Swal.fire(
                                "Deleted!",
                                "User has been deleted.",
                                "success"
                            );
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                        },
                        error: function(error) {
                            console.log(error);
                            alert("Time to Debug");
                        }
                    });
                }
            });
        });

        $('.viewBtn').on('click', function(event) {

            $('#userViewModal').modal('show');

            $("#username").val($(this).attr('data-name'));
            $("#email").val($(this).attr('data-email'));
            $("#mobile").val($(this).attr('data-mobile'));
            $("#role").val($(this).attr('data-role'));
            $('.custom-user').text($(this).attr('data-name'));



        });


    });
</script>


@endsection