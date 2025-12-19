function AddCategory() {
  $("#CategoryHeading").html("Add Blog Category");
  $("#category_form_action").val("add");
  $("#modal_blog_category").modal("show");
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
  $("#CategoryHeading").html("Update Blog Category");

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
        $("#category_form_action").val("Update");
        $("#category_form_id").val(category_id);
      }
    }
  );
  $("#modal_blog_category").modal("show");
}

const urlOutput = document.getElementById("Url");
const headingInput = document.getElementById("Category");

function generateUrl() {
  const headingText = headingInput.value;
  const urlFriendlyText = headingText
    .trim()
    .toLowerCase()
    .replace(/[^a-z0-9-_ ]+/g, "")
    .replace(/\s+/g, "-");

  urlOutput.value = urlFriendlyText;
}
