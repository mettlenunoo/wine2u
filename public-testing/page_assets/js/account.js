
  $('#profile_form').submit(function (event) {
      event.preventDefault();

      document.getElementById('profile_btn').innerHTML = `Loading...`;
      profile_street
      var fname = $("#profile_FirstName").val();
      var lname = $("#profile_LastName").val();
      var email = $("#profile_Email").val();
      var phone = $("#profile_phone").val();
      var country = $("#profile_country").val();
      var street = $("#profile_street").val();
      var sex = $("#profile_sex").val();
      var dob = $("#profile_DOB").val();
      var nationality = $("#profile_nationality").val();
      var state = $("#profile_state").val();
      var apartment = $("#profile_apartment").val();
      var city = $("#profile_city").val();
      var zip = $("#profile_zip").val();

      var formData = new FormData();
      formData.append('fname', fname);
      formData.append('lname', lname);
      formData.append('email', email);
      formData.append('phonenumber', phone);
      formData.append('country', country);
      formData.append('street', street);
      formData.append('gender', sex);
      formData.append('dob', dob);
      formData.append('nationality', nationality);
      formData.append('state', state);
      formData.append('apartment', apartment);
      formData.append('city', city);
      formData.append('zip', zip);
      


      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          method: 'POST',
          url: '/account/update_profile',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function (data) {
              
              document.getElementById('profile_message').innerHTML =
                  `<span class="alert alert-sm alert-success alert-dismissible fade show" role="alert">
    Updated Successfully
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </span>`;
              
          document.getElementById('profile_btn').innerHTML = `Save Changes`;

          },
          error: console.error
      });

  });


  
$('#changepassword_form').submit(function(event) {
  event.preventDefault();

  var currentPassword = document.getElementById("current_password").value;
  var password = document.getElementById("newpassword").value;
  var confirm_password = document.getElementById("confirm_password").value;
  
  // Disable the Submit button
  document.getElementById("cp_btn").innerHTML = "Loading...";
  $("#cp_btn").attr("disabled", true);

  // BINDING DATA TO DATA FORM
  var formData = new FormData();
  formData.append('currentpassword',currentPassword);
  formData.append('password',password);
  formData.append('password_confirmation',confirm_password);
 

  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
      type:'POST',
      url:'/account/profile/changepassword',
      data:formData,
      cache:false,
      contentType: false,
      processData: false,
      success:function(response){
        $('#changepassword_form').trigger("reset");
           console.log(response);

          if(response == "success"){ 

            document.getElementById("cpMessage").innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> Profile updated successfully. </strong> </div>';

          }else{
        
            document.getElementById("cpMessage").innerHTML = '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> Whoops, '+ response +' </strong> </div>';
         
          }

          $("#cp_btn").attr("disabled", false);
          document.getElementById("cp_btn").innerHTML = "Submit";
         
      },

      error: function(jqXhr, json, errorThrown){// this are default for ajax errors 
        var errors = jqXhr.responseJSON;
        var errorsHtml = '';
        $.each(errors['errors'], function (index, value) {
            //errorsHtml += '<ul class="list-group"><li class="list-group-item alert alert-danger">' + value + '</li></ul>';
            errorsHtml += value +' <br>';
        });

        document.getElementById("cpMessage").innerHTML = '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong> Whoops, <br/> '+ errorsHtml +' </strong> </div>';

        $("#cp_btn").attr("disabled", false);
        document.getElementById("cp_btn").innerHTML = "Submit";

        $('#changepassword_form').trigger("reset");

    },

  
  });

});