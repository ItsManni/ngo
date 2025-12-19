$(document).ready(function () {
  var i = 1;
  $("#all_banner").dataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ordering: false,
    serverMethod: "post",
    ajax: {
      url: "ajax/view-all-banner-post.php",
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
        data: "Banner",
      },
      {
        data: "Action",
      },
    ],
  });
});

function AddBanner() {
  $("#form_action").val("add");
  $("#banner_form")[0].reset();
  $("#add_banner").modal("show");
  $("#addBannerBtn").html("Add");
  $("#BannerHeading").html("Add Banner");
  $("#form_id").val("-1");
}

function UpdateBanner_modal(event_id) {
  $("#addBannerBtn").html("Update");
  $("#BannerHeading").html("Update Banner");

  $.post(
    "ajax/get_banner_details.php",
    {
      ID: event_id,
    },
    function (data, status) {
      var response = JSON.parse(data);
      if (response.error == false) {
        $("#Feature").val(response.data.Feature);
        $("#old_banner_img").val(response.data.Banner);
        // $("#old_profile_img").val(response.data.ProfileImg);
        $("#form_action").val("Update");
        $("#form_id").val(event_id);
      }
    }
  );
  $("#add_banner").modal("show");
}

function AddUpdateBannerForm() {

  var Banner = document.getElementById("Banner");
  var old_banner_img = document.getElementById("old_banner_img");

  if (old_banner_img == "") {
    if (!Banner.value) {
      ProductAlert("Please Upload Banner.");
      return false;
    }
  }

  let myForm = document.getElementById("banner_form");
  var formData = new FormData(myForm);

  $("#addBannerBtn").html("Please Wait..");
  $.ajax({
    url: "action/banner-form-action.php",
    type: "POST",
    data: formData,
    success: function (data) {
      var response = JSON.parse(data);
      ProductAlert(response.message);
      if (response.error == false) {
        setInterval(function () {
          location.reload();
        }, 1500);
        $("#addBannerBtn").html("Add");
        $("#banner_form")[0].reset();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  return false;
}

function DeleteBanner(banner_id) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete ?",
    function () {
      $.post(
        "action/delete-banner.php",
        {
          ID: banner_id,
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
