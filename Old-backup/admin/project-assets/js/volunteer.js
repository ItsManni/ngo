function AddVolunteer() 
{
  $("#edit_user_modal").modal("show");
  $("#EditUserBtn").html("Submit");
  $("#edit_user_modal .modal-title").html("Fill Up The Form");
  $("#edit_user_form")[0].reset();
  $("#EditFormID").val("-1");
}

function isValidEmail(email) {
  var emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
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
    value = value.replace(/[^0-9.]/g, '');
    input.value = value;
}

function UpdateUserDetails()
{
  var user_name = $("#UserName").val();
  if(user_name == ""){
      ProductAlert("Please Enter Name.");
      return false;
  }

  var user_email = $("#UserEmail").val();
  if(user_email == ""){
      ProductAlert("Please Enter Email.");
      return false;
  }

  if(isValidEmail(user_email) == false){
      ProductAlert("Please Enter Valid Email.");
      return false;
  }

  var user_phone_number = $("#UserPhoneNumber").val();
  if(user_phone_number == ""){
      ProductAlert("Please Enter Phone Number.");
      return false;
  }

  if(validaphone(user_phone_number) == false){
      ProductAlert("Please Enter Valid Phone Number.");
      return false;
  }

  $("#EditUserBtn").html("Please Wait..");

  // Check if it's add or update based on EditFormID
  var editFormID = $("#EditFormID").val();
  var actionUrl = (editFormID == "-1") ? "action/add-volunteer.php" : "action/update-volunteer.php";

  $.ajax({
      url: actionUrl,
      type: "POST",
      data: $("#edit_user_form").serialize(),
      success: function(data) {
          var response = JSON.parse(data);
          ProductAlert(response.message);
          if (response.error == false) {
              setInterval(function() {
                  location.reload();
              }, 1500);
              $("#EditUserBtn").html("Submit");
              $('#edit_user_form')[0].reset();
          }
          else
          {
            $("#EditUserBtn").html("Submit");
          }
      },
      error: function(xhr, status, error) {
          ProductAlert("Error: " + error);
          $("#EditUserBtn").html("Submit");
      }
  });

  return false;
}

function DeleteUser(User_id) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete Volunteer?",
    function () {
      $.post(
        "action/delete-volunteer.php",
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
  $("#edit_user_modal .modal-title").html("Fill Up The Form");

  $.post("ajax/get-volunteer-details.php", {
    VolunteerID: UserID
  },
    function (data, status) {
      var response = JSON.parse(data);
      console.log(response.data);

      if (response.error == false) 
      {
        $("#UserName").val(response.data.Name);
        $("#UserEmail").val(response.data.Email);
        $("#UserPhoneNumber").val(response.data.Mobile);
        $("#UserOccupation").val(response.data.Occupation);
        $("#UserCountry").val(response.data.Country);
        $("#UserPincode").val(response.data.Pincode);
        $("#UserState").val(response.data.State);
        $("#UserCity").val(response.data.City);
        $("#UserAddress").val(response.data.Address);
        
        if(response.data.Consent == 1) {
          $("#UserConsent").prop('checked', true);
        } else {
          $("#UserConsent").prop('checked', false);
        }

        $("#EditFormID").val(UserID);
        $("#EditUserBtn").html("Submit");
      }
    });

  $("#edit_user_modal").modal("show");
}

// Initialize DataTable
$(document).ready(function() {
    $("#view-users").DataTable({
        autoFill: true,
    });
});