function AddUpdateHomePageForm() {

    let myForm = document.getElementById("home_page_form");
    var formData = new FormData(myForm);

    $("#addPageBtn").html("Please Wait..");
    $.ajax({
      url: "action/update_home_page.php",
      type: "POST",
      data: formData,
      success: function (data) {
        var response = JSON.parse(data);
        ProductAlert(response.message);
        if (response.error == false) {
          setInterval(function () {
            location.reload();
          }, 1500);
           $("#addPageBtn").html("Save & Submit");

          $("#home_page_form")[0].reset();
        }else{
           $("#addPageBtn").html("Save & Submit");
        }
      },
      cache: false,
      contentType: false,
      processData: false,
    });
    return false;
  }
