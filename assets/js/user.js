$(document).ready(function() {

    var curUrl = window.location.href;
    var url = new URL(curUrl);
    var barangay = url.searchParams.get("barangay");

    // $('#reserve-slot').click(function(e) {

    //     var form = $('#add-reservation');

    //     $.ajax({
    //         type: 'POST',
    //         url: '../data/add_reservation.php',
    //         data: form.serialize(),
    //         dataType: 'json',
    //         encode: true
    //     }).done(function(response) {
    //         console.log(response);
    //         if (!response.success) {

    //             if (response.errors.reserve_time) {
    //                 alert(response.errors.reserve_time);
    //             }
    //             if (response.errors.event) {
    //                 alert(response.errors.event);
    //             }

    //             Command: toastr["error"]("Submit Failed", "Please check your form again")

    //             toastr.options = {
    //                 "closeButton": true,
    //                 "debug": false,
    //                 "newestOnTop": true,
    //                 "progressBar": true,
    //                 "positionClass": "toast-bottom-right",
    //                 "preventDuplicates": false,
    //                 "onclick": null,
    //                 "showDuration": "300",
    //                 "hideDuration": "1000",
    //                 "timeOut": "10000",
    //                 "extendedTimeOut": "1000",
    //                 "showEasing": "swing",
    //                 "hideEasing": "linear",
    //                 "showMethod": "fadeIn",
    //                 "hideMethod": "fadeOut"
    //             }

    //         } else {
    //             Command: toastr["info"]("Success", "Saving data ...")

    //                 toastr.options = {
    //                 "closeButton": true,
    //                 "debug": false,
    //                 "newestOnTop": true,
    //                 "progressBar": true,
    //                 "positionClass": "toast-bottom-right",
    //                 "preventDuplicates": false,
    //                 "onclick": null,
    //                 "showDuration": "300",
    //                 "hideDuration": "1000",
    //                 "timeOut": "10000",
    //                 "extendedTimeOut": "1000",
    //                 "showEasing": "swing",
    //                 "hideEasing": "linear",
    //                 "showMethod": "fadeIn",
    //                 "hideMethod": "fadeOut"
    //             }
    //             setTimeout(function() {
    //                 window.location.href = "index.php";
    //             }, 1000);
    //         }

    //     })
    //     e.preventDefault();
    // })


    $('#time-select').on('change', function() {
        if ($('#time-select:checked').length > 2) {
            this.checked = false;
        }
    });

    $('#check-date').click(function() {

        var date = $('.datepicker').val();
        if (date == '') {
            alert('Please pick a date first!');
        } else {
            $('#modal-8').modal('show', { backdrop: 'static' });
            $.ajax({
                url: 'events.php',
                type: 'POST', // Send post data
                dataType: "json",
                data: 'type=check&date=' + date + '&barangay=' + barangay,
                async: false,
                success: function(s) {
                    hours = s;

                    var html = '';
                    html += '<input type="hidden" name="date" value="' + hours[0]['date'] + '">';
                    for (var i in hours) {

                        html += '<div class="col-md-3 text-center"><label><input type="checkbox" name="reserve[]" id="time-select" value="' + hours[i]['hour'] + '">' + hours[i]['hour'] + '</label></div>';
                        //$('table[data-date=' + simpleDate + ']').html('<tr><td class="text-center">time</td><td class="text-center">'+freshevents[0]['title']+'</td><td class="text-center">'+freshevents[0]['user_id']+'</td></tr>');
                    }
                    $('#time').html(html);


                }
            });
        }

    })

    $.ajax({
        url: '../user/events.php?barangay=' + barangay,
        type: 'POST',
        data: 'type=fetch',
        async: false,
        success: function(s) {
            json_events = s;
            console.log(json_events);
        }
    });

    function getFreshEvents() {
        $.ajax({
            url: '../user/events.php?barangay=' + barangay,
            type: 'POST',
            data: 'type=fetch',
            async: false,
            success: function(s) {
                freshevents = s;
                console.log(freshevents);
            }
        });
        $('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
    }

    function selectBarangay() {
        var barangay = $('#select-barangay').val();
        if (barangay != '') {
            var curUrl = window.location.href;
            var newUrl = curUrl.substr(0, curUrl.indexOf("?"));
            var filter = '?barangay=' + barangay;
            window.location.href = newUrl + filter;
        }
        getFreshEvents()

    }

    $('#select-barangay').change(function(e) {
        selectBarangay();
    })

    var calendar = $('#calendar').fullCalendar({
        dayClick: function() {

            //$('#modal-6').modal('show', {backdrop: 'static'});
            var simpleDate = $(this).data('date')
            var date = new Date($(this).data('date'));
            var titleDate = date.toDateString();
            $('span#date').text(titleDate);

            //get events on this day
            $.ajax({
                url: 'events.php',
                type: 'POST', // Send post data
                dataType: "json",
                data: 'type=getEvent&date=' + $(this).data('date'),
                async: false,
                success: function(s) {
                    freshevents = s;


                    var modal = document.getElementById("modal-6");
                    var att = document.createAttribute("data-date");
                    att.value = simpleDate;
                    modal.setAttributeNode(att);

                    var tr = document.getElementById("event-table");
                    var tr_attrib = document.createAttribute("data-date");
                    tr_attrib.value = simpleDate;
                    tr.setAttributeNode(tr_attrib);

                    $('div[data-date=' + simpleDate + ']').modal('show', { backdrop: 'static' });
                    //$('#modal-6').modal('show', {backdrop: 'static'});
                    var table;
                    table += '<tr><th class="text-center">Time</th><th class="text-center">Event</th><th class="text-center">User ID</th></tr>';
                    for (var i = 1; i <= freshevents.length; i++) {

                        table += '<tr><td class="text-center">' + freshevents[0]['start_time'] + '-' + freshevents[0]['end_time'] + '</td><td class="text-center">' + freshevents[0]['title'] + '</td><td class="text-center">' + freshevents[0]['user_id'] + '</td></tr>';
                        //$('table[data-date=' + simpleDate + ']').html('<tr><td class="text-center">time</td><td class="text-center">'+freshevents[0]['title']+'</td><td class="text-center">'+freshevents[0]['user_id']+'</td></tr>');
                    }
                    $('table[data-date=' + simpleDate + ']').html(table);

                }
            });
            //$('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));

        },
        events: JSON.parse(json_events),
        header: {
            left: 'title',
            right: 'month,agendaWeek,agendaDay today prev,next'
        },

    });

})