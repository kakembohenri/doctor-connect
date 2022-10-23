<div class="sidebar-overlay" data-reff=""></div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/Chart.bundle.js"></script>
<!-- <script src="assets/js/node_modules/chartjs/chart.js"></script> -->
<script src="assets/js/chart.js"></script>
<script src="assets/js/sweetalert.min.js"></script>
<script src="assets/js/app.js"></script>


<script src="assets/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/datatables-buttons/js/buttons.print.min.js"></script>

<!-- table script -->
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        });
    });
</script>



<script>
    $(function() {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });

    $(function() {

        let deletBtns = $(".delete");

        $(".fa-star").css({
            "cursor": "pointer"
        });


        $(".fa-star").each((index, star) => {

            $(star).on("click", ev => {
                let id = ($(star).attr("target-doctor-id"));

                stars = $($(star).attr("doctor-class"));

                for (var i = 0; i < stars.length; i++) {
                    $(stars[i]).removeClass("text-warning");
                }
                for (var i = 0; i < $(star).attr("value"); i++) {
                    $(stars[i]).addClass("text-warning");
                }
                $(id).val($(star).attr("value"));
            });
        });



        $(".rating-box").each((index, box) => {

            let stars = $(box).children();
            let rating = Math.round($(box).attr("rating-value"));

            for (var i = -1; i < rating; i++) {
                $(stars[i]).addClass("text-warning");
            }
        });


        $(".save-rating").each((index, btn) => {

            $(btn).on("click", ev => {

                let value = $($(btn).attr("target-doctor-id")).val();
                let patient_id = $(btn).attr("patient-id");
                let doctor_id = $(btn).attr("doctor-id");
                let appointment_id = $(btn).attr("appointment-id");
                if (value !== "") {

                    $.ajax({
                        url: "actions/action.php?add_rating=true&patient_id=" + patient_id + "&doctor_id=" + doctor_id + "&value=" + value + "&appointment_id=" + appointment_id,
                        method: "get",
                        contentType: "application/json",
                        success: (data, status) => {
                            swal("", "Rating added successfully", "success");
                        },
                        error: (obj, status, error) => {

                            if (obj.status === 200) {
                                swal("", "Rating added successfully", "success");
                            } else {
                                swal("", "Something went wrong", "error");
                            }

                        }



                    }).done((message) => {
                        swal("", "Something went wrong", "error");
                    })

                } else {
                    swal("", "Provide your ratings", "info");
                }


            });

        });




        // delete buttons for all modules
        deletBtns.each((index, btn) => {

            $(btn).on("click", ev => {
                $("#deleteLink").attr("href", $(btn).attr("data-link"));
            });

        })

    });


    // form validation
    $(function() {


        $password1 = $("#password");
        $password2 = $("#password2");

        $password2.on("input", ev => {
            console.log(ev.target.value);
        });




    });









    $(function() {

        $form = $("#chat_form");


        $form.on("submit", ev => {

            ev.preventDefault();
            $message = $("#message");



            //  time: 9:00 am

            var date = new Date();

            hr = date.getHours();

            a = hr >= 12 ? "pm" : "am";
            hr = hr > 12 ? hr - 12 : hr;

            time = `${hr}:${date.getMinutes()} ${a}`;
            message = $message.val();

            if (message.trim() !== "") {
                let chatStructure = '<div class="chat chat-right">';
                chatStructure += '<div class="chat-body">';
                chatStructure += '<div class="chat-bubble">';
                chatStructure += '<div class="chat-content">';
                chatStructure += '<p>' + message + '</p>';
                chatStructure += '<span class="chat-time text-sm">' + time + '</span>';
                chatStructure += ' </div></div> </div></div>';


                $("#chatDiv").append(chatStructure);

                $.ajax({
                    type: 'get',
                    url: $form.attr('action'),
                    data: $form.serialize(),
                    success: function(data) {
                        swal("Success", "message set successfully", "success");
                        $(".chat-alert").hide();
                        $form.trigger("reset");
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            }

        });


        setInterval(function() {
            $.ajax({
                url: "actions/action.php?count_chats",
                success: function(data) {

                    messages = data.data;

                    var total_count = 0;

                    for (var i = 0; i < messages.length; i++) {

                        chat_id = messages[i].id;

                        badge_id = `#chat-${chat_id}`;
                        num = messages[i].num;

                        total_count += num;

                        if (num > 0) {
                            $(badge_id).text(num);
                            $(badge_id).css({
                                "display": "block"
                            })
                        } else {
                            $(badge_id).css({
                                "display": "none"
                            })
                        }


                    }

                    if (total_count > 0) {
                        $(".chat-count").text(total_count);
                        $(".chat-count").css({
                            "display": "block"
                        })
                    } else {
                        $(".chat-count").css({
                            "display": "none"
                        })
                    }


                }
            })
        }, 150);

    });
</script>