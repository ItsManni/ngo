function AddCategory() {
  $("#CategoryHeading").html("Add Slider Category");
  $("#category_form_action").val("add");
  $("#modal_slider_category").modal("show");
}

function AddUpdateCategoryForm() {
  var Category = $("#Category").val();

  if (Category == "") {
    ProductAlert("Please Enter Category Name");
    return false;
  }

  let myForm = document.getElementById("category_form");
  var formData = new FormData(myForm);

  var form_action = $("#category_form_action").val();

  $("#addCategoryBtn").html("Please Wait..");
  $.ajax({
    url: "action/add_update_category.php",
    type: "POST",
    data: formData,
    success: function (data) {
      var response = JSON.parse(data);
      ProductAlert(response.message);
      if (response.error == false) {
        setInterval(function () {
          location.reload();
        }, 1500);
        if (form_action == "add") {
          $("#addCategoryBtn").html("Add");
        } else {
          $("#addCategoryBtn").html("Update");
        }

        $("#category_form")[0].reset();
      }else{
        if (form_action == "add") {
            $("#addCategoryBtn").html("Add");
          } else {
            $("#addCategoryBtn").html("Update");
          }
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  return false;
}

function UpdateCategory_modal(category_id) {
  $("#addCategoryBtn").html("Update");
  $("#CategoryHeading").html("Update Slider Category");


  $.post(
    "ajax/get_category_details.php",
    {
      ID: category_id,
    },
    function (data, status) {
      var response = JSON.parse(data);
      if (response.error == false) {
        $("#Category").val(response.data.CategoryName);
        $("#Url").val(response.data.Url);
        $("#PriorityIndex").val(response.data.PriorityIndex);
        $("#CategoryPara").val(response.data.CategoryPara);
        $("#category_form_action").val("Update");
        $("#category_form_id").val(category_id);
      }
    }
  );
  $("#modal_slider_category").modal("show");
}

function DeleteSliderCategory(slider_category) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete ?",
    function () {
      $.post(
        "action/delete-category.php",
        {
          ID: slider_category,
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


function AddUpdateSliderForm() {

    var SliderBackgroundImage = document.getElementById("SliderBackgroundImage");
    var old_slider_bg = document.getElementById("old_slider_bg");

    if (old_slider_bg == "") {
        if (!SliderBackgroundImage.value) {
        ProductAlert("Please Upload Slider Background Image.");
        return false;
        }
    }

    var SliderImage = document.getElementById("SliderImage");
    var old_slider_img = document.getElementById("old_slider_img");

    if (old_slider_img == "") {
        if (!SliderImage.value) {
        ProductAlert("Please Upload Slider Image.");
        return false;
        }
    }

    var SliderHeading = $("#SliderHeading").val();

    if (SliderHeading == "") {
      ProductAlert("Please Enter Slider Heading");
      return false;
    }

    var SliderDescription = $("#SliderDescription").val();

    if (SliderDescription == "") {
      ProductAlert("Please Enter Slider Description");
      return false;
    }

    let myForm = document.getElementById("slider_form");
    var formData = new FormData(myForm);

    $("#addSliderBtn").html("Please Wait..");
    $.ajax({
      url: "action/add_update_slider.php",
      type: "POST",
      data: formData,
      success: function (data) {
        var response = JSON.parse(data);
        ProductAlert(response.message);
        if (response.error == false) {
          setInterval(function () {
            location.reload();
          }, 1500);
           $("#addSliderBtn").html("Save & Submit");

          $("#slider_form")[0].reset();
        }else{
           $("#addSliderBtn").html("Save & Submit");
        }
      },
      cache: false,
      contentType: false,
      processData: false,
    });
    return false;
  }
