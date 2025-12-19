function isValidEmail(email) {
  var emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
  return emailRegex.test(email);
}

function validaphone(phone) {
  var regex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  return regex.test(phone);
}

function validISNumber(basic) {
  const input = event.target;
  input.value = input.value.replace(/[^0-9.]/g, "");
}

// Utility to show error
function showError(fieldId, message) {
  $("#" + fieldId + "-error").text(message);
  $("#" + fieldId).addClass("input-error");
}

// Utility to clear all errors
function clearErrors() {
  $(".error-msg").text("");
  $(".input-error").removeClass("input-error");
}

function AddUpdateContactForm() {

  var FirstName = $("#name").val();
  if (FirstName == "") {
    Alert("Please Enter Name");
    return false;
  }


  var Email = $("#email").val();
  if (Email == "") {
    Alert("Please Enter Email");
    return false;
  } else if (!isValidEmail(Email)) {
    Alert("Please Enter Valid Email");
    return false;
  }

  var PhoneNumber = $("#phoneNumber").val();
  if (PhoneNumber == "") {
    Alert("Please Enter Phone Number");
    return false;
  } else if (!validaphone(PhoneNumber)) {
    Alert("Please Enter Valid Phone Number");
    return false;
  }

  //   var Company = $("#subject").val();
  //   if (Company == "") {
  //    Alert("Please Enter First Name");
  //       return false;
  //   }


  let myForm = document.getElementById("join_us_form");
  var formData = new FormData(myForm);

  $("#addJoinBtn").html("Please Wait..");
  $.ajax({
    url: "action/join-us-form-action.php",
    type: "POST",
    data: formData,
    success: function (data) {
      var response = JSON.parse(data);
      Alert(response.message);
      if (!response.error) {
        setTimeout(function () {
          location.reload();
        }, 1500);
        $("#addJoinBtn").html("Submit");
        $("#join_us_form")[0].reset();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });

  return false;
}

