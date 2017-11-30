$(document).ready(function() {
    
    // Command: toastr["info"]("You have 3 unread emails", "Hello, my name is <strong>TOASTR</strong>")
    
    // toastr.options = {
    //   "closeButton": true,
    //   "debug": false,
    //   "newestOnTop": true,
    //   "progressBar": true,
    //   "positionClass": "toast-bottom-right",
    //   "preventDuplicates": false,
    //   "onclick": null,
    //   "showDuration": "300",
    //   "hideDuration": "1000",
    //   "timeOut": "10000",
    //   "extendedTimeOut": "1000",
    //   "showEasing": "swing",
    //   "hideEasing": "linear",
    //   "showMethod": "fadeIn",
    //   "hideMethod": "fadeOut"
    // }

    $('#add_court').click(function(e){
        var form = $('#add_court_form');

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        $.ajax({
            type: 'POST',
            url: '../data/add_court.php',
            data: form.serialize(),
            dataType: 'json',
            encode: true
        }).done(function(response) {
            console.log(response);

            if (!response.success) {

                if (response.errors.barangay) {
                    $('.input-barangay').addClass('has-error'); // add the error class to show red input
                    $('.input-barangay').append('<div class="help-block">' + response.errors.barangay + '</div>'); // add the actual error message under our input
                }
                if (response.errors.courtname) {
                    $('.input-courtname').addClass('has-error'); // add the error class to show red input
                    $('.input-courtname').append('<div class="help-block">' + response.errors.courtname + '</div>'); // add the actual error message under our input
                }

                Command: toastr["error"]("Submit Failed", "Please check your form again")
                
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "positionClass": "toast-bottom-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "10000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

            } else {
                Command: toastr["info"]("Success", "Saving data ...")
                
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "positionClass": "toast-bottom-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "10000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                setTimeout(function() {
                    window.location.href = "add_court.php";
                }, 1000);
            }

        })
        e.preventDefault();
    })

    $('#edit_court_form').submit(function(e){
        e.preventDefault();
        var id = $('#court_id').val();
        var form_id = $(this).data('id');

            var form = $('form[data-id=' + form_id + ']');
            $('.form-group').removeClass('has-error'); // remove the error class
            $('.help-block').remove(); // remove the error text
    
            $.ajax({
                type: 'POST',
                url: '../data/edit_court.php',
                data: form.serialize(),
                dataType: 'json',
                encode: true
            }).done(function(response) {
                console.log(response);
                if (!response.success) {
    
                    if (response.errors.barangay) {
                        $('.input-barangay').addClass('has-error'); // add the error class to show red input
                        $('.input-barangay').append('<div class="help-block">' + response.errors.barangay + '</div>'); // add the actual error message under our input
                    }
                    if (response.errors.courtname) {
                        $('.input-courtname').addClass('has-error'); // add the error class to show red input
                        $('.input-courtname').append('<div class="help-block">' + response.errors.courtname + '</div>'); // add the actual error message under our input
                    }
    
                    Command: toastr["error"]("Submit Failed", "Please check your form again")
                    
                    toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": true,
                      "progressBar": true,
                      "positionClass": "toast-bottom-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "10000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }
    
                } else {
                    Command: toastr["info"]("Success", "Saving data ...")
                    
                    toastr.options = {
                      "closeButton": true,
                      "debug": false,
                      "newestOnTop": true,
                      "progressBar": true,
                      "positionClass": "toast-bottom-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "10000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }
                    setTimeout(function() {
                        window.location.href = "add_court.php";
                    }, 1000);
                }
    
            })
        
    })
})