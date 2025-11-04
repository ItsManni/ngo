$(document).ready(function () {
  var i = 1;
  $("#all_static_pages").dataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ordering: false,
    serverMethod: "post",
    ajax: {
      url: "ajax/view-all-seopages-post.php",
    },
    columnDefs: [
      {
        targets: [0],
        className: "text-center",
      },
    ],
    order: [[1, "asc"]],
    columns: [
      {
        data: "id",
        render: function (data, type, row, meta) {
          return meta.row + meta.settings._iDisplayStart + 1;
        },
      },
      {
        data: "PageName",
      },
      {
        data: "Url",
      },
      {
        data: "Action",
      },
    ],
  });
});

function AddSeoPage() {
  $("#form_action").val("add");
  $("#static_page_form")[0].reset();
  $("#add_static_page").modal("show");
  $("#addSeoPageBtn").html("Add");
  $("#SeoPageHeading").html("Add Page");
  $("#form_id").val("-1");
}

function UpdateSeoPage_modal(page_id) {
  $("#addSeoPageBtn").html("Update");
  $("#SeoPageHeading").html("Update Page");

  $.post(
    "ajax/get_seopages_details.php",
    {
      ID: page_id,
    },
    function (data, status) {
      var response = JSON.parse(data);
      if (response.error == false) {
        $("#PageName").val(response.data.PageName);
        $("#Url").val(response.data.Url);
        $("#MetaTitle").val(response.data.MetaTitle);
        $("#MetaDescription").val(response.data.MetaDescription);
        $("#MetaKeywords").val(response.data.MetaKeywords);
        $("#OGTitle").val(response.data.OGTitle);
        $("#OGDescription").val(response.data.OGDescription);
        $("#old_og_image").val(response.data.OGImage);
        $("#form_action").val("Update");
        $("#form_id").val(page_id);
      }
    }
  );
  $("#add_static_page").modal("show");
}

function AddUpdateSeoPageForm() {
  var PageName = $("#PageName").val();

  if (PageName == "") {
    ProductAlert("Please Enter Page Name");
    return false;
  }

  // var EventImg = document.getElementById("EventImg");
  // var old_og_image = document.getElementById("old_og_image");

  // if (old_og_image == "") {
  //   if (!EventImg.value) {
  //     ProductAlert("Please Upload Event Banner.");
  //     return false;
  //   }
  // }

  let myForm = document.getElementById("static_page_form");
  var formData = new FormData(myForm);

  $("#addSeoPageBtn").html("Please Wait..");
  $.ajax({
    url: "action/seopages-form-action",
    type: "POST",
    data: formData,
    success: function (data) {
      var response = JSON.parse(data);
      ProductAlert(response.message);
      if (response.error == false) {
        setInterval(function () {
          location.reload();
        }, 1500);
        $("#addSeoPageBtn").html("Add");
        $("#static_page_form")[0].reset();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  return false;
}

function DeleteSeoPage(page_id) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete ?",
    function () {
      $.post(
        "action/delete-seopages.php",
        {
          ID: page_id,
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

const urlOutput = document.getElementById("Url");
const headingInput = document.getElementById("PageName");

function generateUrl() {
  const headingText = headingInput.value;
  const urlFriendlyText = headingText
    .trim()
    .toLowerCase()
    .replace(/[^a-z0-9-_ ]+/g, "")
    .replace(/\s+/g, "-");

  urlOutput.value = urlFriendlyText;
}
