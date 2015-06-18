$(document).ready(function() {
            $('#login-password-hide').hide();
            $('#login-password-hide').attr('readonly','readonly');
            $('#login-password').blur(function() {
            $('#login-password-hide').val($(this).val());
            });

           $('#show-password').change(function() {
              var isChecked = $(this).prop('checked');
               if (isChecked) {
                   $('#login-password').hide();
                   $('#login-password-hide').show();
                }
               else {
                  $('#login-password').show();
                  $('#login-password-hide').hide();
             }
           });
        });
