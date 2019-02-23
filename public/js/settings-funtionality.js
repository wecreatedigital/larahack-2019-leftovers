$( document ).ready(function() {



    console.log( "document ready!" );






    // On Update Profile Settings
    $(document).on('submit', '#update-profile-settings', function(e) {
        e.preventDefault();
        $this = $(this);

        $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/update-profile-settings',
        data: {
          '_token': $('input[name=_token]').val(),
          'id': $('#auth-id').val(),
          'username': $('#username').val(),
          'nickname': $('#nickname').val(),
          'bio': $('#bio').val(),
          'company': $('#company').val(),
        },
        datatype: 'json',
        success: function(data) {

          if (data.errors) {
              setTimeout(function () {
                  toastr.error('Something went wrong!', 'Error Alert', {timeOut: 5000});
              }, 500);

              if (data.errors.username) {
                  $('#username').addClass('is-invalid');
                  isNotValid($('.username-invalid-feedback'), data.errors.username);
              }

              if (data.errors.nickname) {
                  $('#nickname').addClass('is-invalid');
                  isNotValid($('.nickname-invalid-feedback'), data.errors.nickname);
              }

              if (data.errors.bio) {
                  $('#bio').addClass('is-invalid');
                  isNotValid($('.bio-invalid-feedback'), data.errors.bio);
              }

              if (data.errors.company) {
                  $('#company').addClass('is-invalid');
                  isNotValid($('.company-invalid-feedback'), data.errors.company);
              }
          }  else {
            toastr.success('Updated Profile Settings!', 'Success Alert', {timeOut: 5000});

            $('#username').removeClass('is-invalid').addClass('is-valid');
            isValid(('.username-invalid-feedback'));

            $('#nickname').removeClass('is-invalid').addClass('is-valid');
            isValid(('.nickname-invalid-feedback'));

            $('#bio').removeClass('is-invalid').addClass('is-valid');
            isValid(('.bio-invalid-feedback'));

            $('#company').removeClass('is-invalid').addClass('is-valid');
            isValid(('.company-invalid-feedback'));

          }
        },
        error: function(error) {
          alert('something went wrong!');
        }
      });

    });

    // On Update Basic Settings
    $(document).on('submit', '#update-basic-settings', function(e) {
        e.preventDefault();
        $this = $(this);

        $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/update-basic-settings',
        data: {
          '_token': $('input[name=_token]').val(),
          'id': $('#auth-id').val(),
          'settings_firstname': $('#settings_firstname').val(),
          'settings_lastname': $('#settings_lastname').val(),
          'gender': $('input[name=gender]:checked').val(),
          'dob': $('#dob').val(),
        },
        datatype: 'json',
        success: function(data) {

          if (data.errors) {
              setTimeout(function () {
                  toastr.error('Something went wrong!', 'Error Alert', {timeOut: 5000});
              }, 500);

              if (data.errors.settings_firstname) {
                  $('#settings_firstname').addClass('is-invalid');
                  isNotValid($('.firstname-invalid-feedback'), data.errors.settings_firstname);
              }

              if (data.errors.settings_lastname) {
                  $('#settings_lastname').addClass('is-invalid');
                  isNotValid($('.lastname-invalid-feedback'), data.errors.settings_lastname);
              }

              if (data.errors.gender) {
                  $('#gender').addClass('is-invalid');
                  isNotValid($('.gender-invalid-feedback'), data.errors.gender);
              }

              if (data.errors.dob) {
                  $('#dob').addClass('is-invalid');
                  isNotValid($('.dob-invalid-feedback'), data.errors.dob);
              }
          }  else {
            toastr.success('Updated Profile Settings!', 'Success Alert', {timeOut: 5000});

            $('#settings_firstname').removeClass('is-invalid').addClass('is-valid');
            isValid(('.firstname-invalid-feedback'));

            $('#settings_lastname').removeClass('is-invalid').addClass('is-valid');
            isValid(('.lastname-invalid-feedback'));

            $('#gender').removeClass('is-invalid').addClass('is-valid');
            isValid(('.gender-invalid-feedback'));

            $('#dob').removeClass('is-invalid').addClass('is-valid');
            isValid(('.dob-invalid-feedback'));

          }
        },
        error: function(error) {
          alert('something went wrong!');
        }
      });
    });

    // On Update Contact Settings
    $(document).on('submit', '#update-contact-settings', function(e) {
        e.preventDefault();
        $this = $(this);

        $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/update-contact-settings',
        data: {
          '_token': $('input[name=_token]').val(),
          'id': $('#auth-id').val(),
          'email_address': $('#email_address').val(),
          'website': $('#website').val(),
          'home_number': $('#home_number').val(),
          'mobile_number': $('#mobile_number').val(),
          'work_number': $('#work_number').val(),
          'address': $('#address').val(),
        },
        datatype: 'json',
        success: function(data) {

          if (data.errors) {
              setTimeout(function () {
                  toastr.error('Something went wrong!', 'Error Alert', {timeOut: 5000});
              }, 500);

              if (data.errors.email_address) {
                  $('#email_address').addClass('is-invalid');
                  isNotValid($('.email_address-invalid-feedback'), data.errors.email_address);
              }

              if (data.errors.website) {
                  $('#website').addClass('is-invalid');
                  isNotValid($('.website-invalid-feedback'), data.errors.website);
              }

              if (data.errors.home_number) {
                  $('#home_number').addClass('is-invalid');
                  isNotValid($('.home_number-invalid-feedback'), data.errors.home_number);
              }

              if (data.errors.mobile_number) {
                  $('#mobile_number').addClass('is-invalid');
                  isNotValid($('.mobile_number-invalid-feedback'), data.errors.mobile_number);
              }

              if (data.errors.work_number) {
                  $('#work_number').addClass('is-invalid');
                  isNotValid($('.work_number-invalid-feedback'), data.errors.work_number);
              }

              if (data.errors.address) {
                  $('#address').addClass('is-invalid');
                  isNotValid($('.address-invalid-feedback'), data.errors.address);
              }
          }  else {
            toastr.success('Updated Profile Settings!', 'Success Alert', {timeOut: 5000});

            $('#email_address').removeClass('is-invalid').addClass('is-valid');
            isValid(('.email_address-invalid-feedback'));

            $('#website').removeClass('is-invalid').addClass('is-valid');
            isValid(('.website-invalid-feedback'));

            $('#home_number').removeClass('is-invalid').addClass('is-valid');
            isValid(('.home_number-invalid-feedback'));

            $('#mobile_number').removeClass('is-invalid').addClass('is-valid');
            isValid(('.mobile_number-invalid-feedback'));

            $('#work_number').removeClass('is-invalid').addClass('is-valid');
            isValid(('.work_number-invalid-feedback'));

            $('#address').removeClass('is-invalid').addClass('is-valid');
            isValid(('.address-invalid-feedback'));

          }
        },
        error: function(error) {
          alert('something went wrong!');
        }
      });
    });

    // On Update Security Settings
    $(document).on('submit', '#update-security-settings', function(e) {
        e.preventDefault();
        $this = $(this);

        $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/update-security-settings',
        data: {
          '_token': $('input[name=_token]').val(),
          'id': $('#auth-id').val(),
          'current_password': $('#current_password').val(),
          'new_password': $('#new_password').val(),
          'confirm_password': $('#confirm_password').val(),
        },
        datatype: 'json',
        success: function(data) {

          if (data.errors) {
              setTimeout(function () {
                  toastr.error('Something went wrong!', 'Error Alert', {timeOut: 5000});
              }, 500);

              if (data.errors.current_password) {
                  $('#current_password').addClass('is-invalid');
                  isNotValid($('.current_password-invalid-feedback'), data.errors.current_password);
              }

              if (data.errors.new_password) {
                  $('#new_password').addClass('is-invalid');
                  isNotValid($('.new_password-invalid-feedback'), data.errors.new_password);
              }

              if (data.errors.confirm_password) {
                  $('#confirm_password').addClass('is-invalid');
                  isNotValid($('.confirm_password-invalid-feedback'), data.errors.confirm_password);
              }
          }  else {
            toastr.success('Updated Profile Settings!', 'Success Alert', {timeOut: 5000});

            $('#current_password').removeClass('is-invalid').addClass('is-valid');
            isValid(('.current_password-invalid-feedback'));

            $('#new_password').removeClass('is-invalid').addClass('is-valid');
            isValid(('.new_password-invalid-feedback'));

            $('#confirm_password').removeClass('is-invalid').addClass('is-valid');
            isValid(('.confirm_password-invalid-feedback'));

          }
        },
        error: function(error) {
          alert('something went wrong!');
        }
      });
    });

    // Good - Is valid feedback
    function isValid(validation) {
      $(validation).removeAttr('hidden').removeClass('invalid-feedback').addClass('valid-feedback').css("display","block").text('Looks good!');
    }

    // Good - Is not valid feedback
    function isNotValid(validation, text) {
      $(validation).removeAttr('hidden').removeClass('valid-feedback').addClass('invalid-feedback').css("display","block").text(text);

    }



});
