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
                    <div>Activity Logs
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
                        <th>Date</th>
                        <th>Effected On</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($activityLogs as $row)
                        <tr>

                            <td data-th="User">{{$row->name}}</td>
                            <td data-th="Date">{{$row->date}}</td>
                            <td data-th="Effected On">{{$row->effected_on}}</td>
                            <td data-th="Action">

                                @if($row->action == 1)
                                    <div class="mb-2 mr-2 badge badge-pill badge-success">CREATE</div>
                                @elseif($row->action == 2)
                                    <div class="mb-2 mr-2 badge badge-pill badge-info">EDIT</div>
                                @else
                                    <div class="mb-2 mr-2 badge badge-pill badge-danger">DELETE</div>
                                @endif

                            </td>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    {{ $activityLogs->links() }}
                </div>
                <div class="float-left">
                    <small> <b>Records : {{ $activityLogs->firstItem() }} - {{ $activityLogs->lastItem() }} of {{ $activityLogs->total() }}</b></small>
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
                            url: "{{ route('user.activity-log-delete') }}",
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


        });


    </script>


@endsection
