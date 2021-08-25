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
                    <div>Login Logs
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a title="Clear Logs" id="delete-logs"  class="btn-shadow mr-3 btn btn-dark search-btn show-loader">
                        <i class="fa fa-trash text-white"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">

            <div class="card-body">

                <table class="mb-0 table rwd-table table table-striped table table-hover" id="page-data-table">
                    <thead style="background-color:#a6d7ff">
                    <tr>

                        <th>User</th>
                        <th>Login Time</th>
                        <th>Logout Time</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($loginLogs as $row)
                        <tr>

                            <td data-th="User">{{$row->user_name}}</td>
                            <td data-th="Login Time">{{$row->login_time}}</td>
                            <td data-th="Logout Time">{{$row->logout_time}}</td>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    {{ $loginLogs->links() }}
                </div>
                <div class="float-left">
                    <small> <b>Records : {{ $loginLogs->firstItem() }} - {{ $loginLogs->lastItem() }} of {{ $loginLogs->total() }}</b></small>
                </div>
            </div>
        </div>
    </div>



<script>
    $(document).ready(function(event) {

        $("#delete-logs").click(function(event) {
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

                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type: "GET",
                        url: "{{ route('user.delete') }}",
                        data: {
                            _token: CSRF_TOKEN,
                        },
                        dataType: "JSON",
                        success: function(response) {
                            console.log("Response " + response);
                            Swal.fire(
                                "Deleted!",
                                "Logs Cleared Successfully",
                                "success"
                            );
                            setTimeout(function() {
                                location.reload();
                            }, 2300);
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
