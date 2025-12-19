function AddUser() 
{
  $("#Center_name").select2({
    placeholder: "Select Center"
  });
  $("#Center_name").select2("val", "");
  $("#Center_name").select2({
    dropdownParent: $("#add_user")
  });
 
  $("#addUpdateBtn").html("Add");
  $("#UserModalHeading").html("Add User");
  $("#user_type").select2({
    placeholder: "Select User Type"
  });
  $("#user_type").select2("val", "");
  $("#user_type").select2({
    dropdownParent: $("#add_user")
  });
  $("#add_user").modal("show");
}

function UpdateUser() {
  $("#add_user").modal("show");
  $("#addUpdateBtn").html("Update");
  $("#UserModalHeading").html("Update User");
}

$("#view-users").DataTable({
  autoFill: true,
});


function isValidEmail(email) {
  // Regular expression to check if the email is valid
  var emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
  
  // Test the email against the regular expression
  return emailRegex.test(email);
}

function validaphone(phone) {
  var regex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  if (!regex.test(phone)) {
    return false;
  } else {
    return true;
  }
}


function validISNumber(basic) {
    const input = event.target;
    let value = input.value;
    
    value = value.replace(/[^0-9.]/g, ''); // Remove non-numeric characters
    input.value = value;
}


function AddUpdateUser(){
  var Center_name = $("#Center_name").val();
  if(Center_name == ""){
      ProductAlert("Please Select Center");
      return false;
  }


  var user_name = $("#user_name").val();

  if(user_name == ""){
      ProductAlert("Please Enter User Name.");
      return false;
  }


  var user_email = $("#user_email").val();

  if(user_email == ""){
      ProductAlert("Please Enter User Email.");
      return false;
  }

  if(isValidEmail(user_email) == false){
      ProductAlert("Please Enter Valid Email.");
      return false;
  }

  var user_phone_number = $("#user_phone_number").val();

  if(user_phone_number == ""){
      ProductAlert("Please Enter User Phone Number.");
      return false;
  }

  if(validaphone(user_phone_number) == false){
      ProductAlert("Please Enter Valid Phone Number.");
      return false;
  }

  var password = $("#password").val();
  if(password == ""){
      ProductAlert("Please Enter User Password");
      return false;
  }

  var confirm_password = $("#confirm_password").val();
  if(confirm_password == ""){
      ProductAlert("Please Enter Confirm Password");
      return false;
  }

  if(password !== confirm_password)
  {
      ProductAlert("Password and Confirm Password doesn't match");
      return false;
  }

  var user_type = $("#user_type").val();
  if(user_type == ""){
      ProductAlert("Please Select User Type");
      return false;
  }

  if(user_type == "Counsellor"){
    var courses = $("#courses").val();
    if(courses == ""){
        ProductAlert("Please Select Counsellor Course");
        return false;
    }
  }

  
  $("#addUpdateBtn").html("Please Wait..");
  $.ajax({
      url: "action/add-user.php",
      type: "POST",
      data: $("#user_form").serialize(),
      success: function(data) {
          var response = JSON.parse(data);
          ProductAlert(response.message);
          if (response.error == false) {
              setInterval(function() {
                  location.reload();
              }, 1500);
              $("#addUpdateBtn").html("Submit");
              $('#user_form')[0].reset();
          }
          else
          {
            $("#addUpdateBtn").html("Add");
          }
      },
  });
  return false;
  
}

function ResetPassword(userEmail)
{
  $("#rp_user_email").val(userEmail);
  $("#reset_password_modal").modal("show");
}

function ResetPasswordAction()
{
  var password = $("#r_password").val();
  if(password == ""){
      ProductAlert("Please Enter User Password");
      return false;
  }

  var confirm_password = $("#r_confirm_password").val();
  if(confirm_password == ""){
      ProductAlert("Please Enter Confirm Password");
      return false;
  }
  if(password !== confirm_password)
  {
      ProductAlert("Password and Confirm Password doesn't match");
      return false;
  }
  $("#resetpasswordBtn").html("Please Wait..");
  $.ajax({
      url: "action/reset_password.php",
      type: "POST",
      data: $("#reset_password_form").serialize(),
      success: function(data) {
          var response = JSON.parse(data);
          ProductAlert(response.message);
          if (response.error == false) {
              $("#resetpasswordBtn").html("Submit");
              $('#reset_password_form')[0].reset();
              $("#reset_password_modal").modal("hide");
          }
          else
          {
            $("#resetpasswordBtn").html("Add");
          }
      },
  });
  return false;
}


function DeleteUser(User_id) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete User?",
    function () {
      $.post(
        "action/delete-user.php",
        {
          ID: User_id,
        },
        function (data, status) {
          var response = JSON.parse(data);
          ProductAlert(response.message);
          if (response.error == false) {
            setInterval(function () {
              location.reload();
            }, 2000);
          }
        }
      );
    },
    function () {
      alertify.error("Deletion Cancelled");
    }
  );
}

function EditUserDetails_modal(UserID) {

  $("#EditUserModalHeading").html("Update User Detaiils");

  $.post("ajax/get-user-details.php", {
    UserID: UserID
  },
    function (data, status) {
      var response = JSON.parse(data);
      console.log(response.data);
      if (response.error == false) 
      {
        $("#edit_user_form_id").val(UserID);
        $("#UserCenter").select2({
          placeholder: "Select Center/Branch"
        });
        $("#UserCenter").select2("val", response.data.CenterID);
        $("#UserCenter").select2({
          dropdownParent: $("#edit_user_modal")
        });

        $("#UserName").val(response.data.Name);
        $("#UserEmail").val(response.data.Email);
        $("#UserPhoneNumber").val(response.data.Mobile);

        $("#UserType").select2({
          dropdownParent: $("#edit_user_modal")
        });
        $("#UserType").val(response.data.UserType).trigger('change');

        if(response.data.UserType == "Counsellor")
        {
           $("#edit_user_modal_course").css("display", "block");
           $('#edit_user_modal_course_div').select2({
                dropdownParent: $("#edit_user_modal")
            })
           $('#edit_user_modal_course_div').val(response.mapped_courses).trigger('change');
        }
        else
        {
            $("#edit_user_modal_course").css("display", "none");
        }       

        $("#EditFormID").val(UserID);
        $("#EditUserBtn").html("Update User");
      }
    });
  $("#edit_user_modal").modal("show");
}

function UpdateUserDetails()
{
  var Center_name = $("#UserCenter").val();
  if(Center_name == ""){
      ProductAlert("Please Select Center");
      return false;
  }


  var user_name = $("#UserName").val();
  if(user_name == ""){
      ProductAlert("Please Enter User Name.");
      return false;
  }


  var user_email = $("#UserEmail").val();
  if(user_email == ""){
      ProductAlert("Please Enter User Email.");
      return false;
  }

  if(isValidEmail(user_email) == false){
      ProductAlert("Please Enter Valid Email.");
      return false;
  }

  var user_phone_number = $("#UserPhoneNumber").val();
  if(user_phone_number == ""){
      ProductAlert("Please Enter User Phone Number.");
      return false;
  }

  if(validaphone(user_phone_number) == false){
      ProductAlert("Please Enter Valid Phone Number.");
      return false;
  }

  
  var user_type = $("#UserType").val();
  if(user_type == ""){
      ProductAlert("Please Select User Type");
      return false;
  }

  if(user_type == "Counsellor"){
    var courses = $("#edit_user_modal_course_div").val();
    if(courses == ""){
        ProductAlert("Please Select Counsellor Course");
        return false;
    }
  }

  
 $("#EditUserBtn").html("Please Wait..");
  $.ajax({
      url: "action/update-user.php",
      type: "POST",
      data: $("#edit_user_form").serialize(),
      success: function(data) {
          var response = JSON.parse(data);
          ProductAlert(response.message);
          if (response.error == false) {
              setInterval(function() {
                  location.reload();
              }, 1500);
              $("#addUpdateBtn").html("Submit");
              $('#user_form')[0].reset();
          }
          else
          {
            $("#addUpdateBtn").html("Add");
          }
      },
  });
  return false;
}