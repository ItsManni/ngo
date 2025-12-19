function AddCustomCode() {
      
    let myForm = document.getElementById("custom_code_form");
    var formData = new FormData(myForm);
  
    $("#custom_code_form_btn").html("Please Wait..");
    $.ajax({
      url: "action/custom-form-action.php",
      type: "POST",
      data: formData,
      success: function (data) {
        var response = JSON.parse(data);
        ProductAlert(response.message);
        if (response.error == false) {
          setInterval(function () {
            location.reload();
          }, 1500);
          $("#custom_code_form_btn").html("Save");
        }else{
          $("#custom_code_form_btn").html("Save");
        }
      },
      cache: false,
      contentType: false,
      processData: false,
    });
    return false;
  
  }
  
 
  