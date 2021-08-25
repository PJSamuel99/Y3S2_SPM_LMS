$(document).ready(function(event) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $("body").on("click", ".deletebtn1", function() {
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
                var action = current_object.attr("data-action");
                var token = jQuery('meta[name="csrf-token"]').attr("content");
                var id = current_object.attr("data-id");
                console.log("action " + action);
                console.log("token " + token);
                console.log("id " + id);

                $("body").html(
                    "<form class='form-inline remove-form' method='DELETE' action='" +
                    action +
                    "'></form>"
                );
                $("body")
                    .find(".remove-form")
                    .append(
                        '<input name="_method" type="hidden" value="delete">'
                    );
                $("body")
                    .find(".remove-form")
                    .append(
                        '<input name="_token" type="hidden" value="' +
                        token +
                        '">'
                    );
                $("body")
                    .find(".remove-form")
                    .append(
                        '<input name="id" type="hidden" value="' + id + '">'
                    );
                $("body")
                    .find(".remove-form")
                    .submit();

                Swal.fire("Deleted!", "Region  has been deleted.", "success");
            }
        });
    });

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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{url('/regiondelete')}}/" + id,
                    data: {
                        _token: CSRF_TOKEN
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log("Response " + response);
                        Swal.fire(
                            "Deleted!",
                            "Your file has been deleted.",
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
});