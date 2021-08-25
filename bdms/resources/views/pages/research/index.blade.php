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
                <div>Research Papers
                    <div class="page-title-subheading">
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <a title="Add New" href="{{ URL::to('research-paper/create') }}" class="btn-shadow mr-3 btn btn-dark search-btn show-loader">
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
                        <th>Category</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Link</th>
                        <th width="100">Actions</th>
                    </tr>
                </thead>
                <tbody>
                 
                    <tr>

                        <td data-th="Code"></td>
                        <td data-th="Name"></td>
                        <td data-th="Category"></td>
                        <td data-th="Author"></td>
                        <td data-th="Date"></td>
                        <td data-th="Link"></td>
                        <td data-th="Actions" width="100">

                            <!-- <a href="" class="editbtn" name="editbtn"><i class="material-icons" data-toggle="tooltip" title="Edit" style="color: #4261f9;">&#xE254;</i></a> -->
                            <!-- <a href="#" data-id="" class="delete deletebtn"><i class="material-icons" data-toggle="tooltip" title="Delete" style="color: red;">&#xE872;</i></a> -->
                        </td>
                    </tr>
                  
            </table>
                <div class="float-right">
                  
                </div>
            <div class="float-left">
                <small> <b></b></small>
            </div>
        </div>
    </div>
</div>
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
            });
        });

       
    });
</script>
@endsection