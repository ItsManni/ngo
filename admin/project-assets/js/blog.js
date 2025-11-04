$(document).ready(function () {
  var i = 1;
  $("#all_blogs").dataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ordering: false,
    serverMethod: "post",
    ajax: {
      url: "ajax/view-all-blogs-post.php",
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
        data: "BlogBanner",
      },
      {
        data: "BlogName",
      },
      {
        data: "ViewBlog",
      },
      {
        data: "Action",
      },
    ],
  });
});

function AddBlog() {
  $("#form_action").val("add");
  $("#blog_form")[0].reset();
  $("#add_blog").modal("show");
  $("#addBlogBtn").html("Add");
  $("#BlogHeading").html("Add Blog");
  $("#form_id").val("-1");
  $(".fc-datepicker").datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    // locale: {
    //   format: "YYYY-MM-DD",
    // },
  });
}

function UpdateBlog_modal(blog_id) {
  $("#addBlogBtn").html("Update");
  $("#BlogHeading").html("Update Blog");

  $.post(
    "ajax/get_blogs_details.php",
    {
      ID: blog_id,
    },
    function (data, status) {
      var response = JSON.parse(data);
      if (response.error == false) {
        $("#BlogName").val(response.data.BlogName);
        $("#Url").val(response.data.Url);
        $("#BlogDate").val(response.data.BlogDate);
        $("#BlogTime").val(response.data.BlogTime);
        $("#BlogDescription").val(response.data.BlogDescription);
        $("#form_action").val("Update");
        $("#form_id").val(blog_id);
      }
    }
  );
  $("#add_blog").modal("show");
}

function AddUpdateBlogForm() {
  var BlogName = $("#BlogName").val();

  if (BlogName == "") {
    ProductAlert("Please Enter Blog Name");
    return false;
  }

  var ShortDescription = $("#ShortDescription").val();

  if (ShortDescription == "") {
    ProductAlert("Please Enter Description");
    return false;
  }

  var BlogImg = document.getElementById("BlogImg");
  var old_blog_img = document.getElementById("old_blog_img");

  if (old_blog_img == "") {
    if (!BlogImg.value) {
      ProductAlert("Please Upload Feature Image / Blog Banner.");
      return false;
    }
  }

  // var Url = $("#Url").val();

  // if (Url == "") {
  //   ProductAlert("Please Enter blog Url");
  //   return false;
  // }

  // var EventDate = $("#EventDate").val();

  // if (EventDate == "") {
  //   ProductAlert("Please Enter Event Date");
  //   return false;
  // }

  // var EventTime = $("#EventTime").val();

  // if (EventTime == "") {
  //   ProductAlert("Please Enter Event Time");
  //   return false;
  // }

  // var EventDescription = $("#EventDescription").val();

  // if (EventDescription == "") {
  //   ProductAlert("Please Enter Event Description");
  //   return false;
  // }

  let myForm = document.getElementById("blog_form");
  var formData = new FormData(myForm);
  var form_action = $("#form_action").val();

  $("#addBlogBtn").html("Please Wait..");
  $.ajax({
    url: "action/blog-form-action.php",
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
            $("#addBlogBtn").html("Save & Submit");
          } else {
            $("#addBlogBtn").html("Save & Update");
          }
        $("#blog_form")[0].reset();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  return false;
}

function DeleteBlog(blog_id) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete Blog?",
    function () {
      $.post(
        "action/delete-blog.php",
        {
          ID: blog_id,
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
const headingInput = document.getElementById("BlogName");

function generateUrl() {
  const headingText = headingInput.value;
  const urlFriendlyText = headingText
    .trim()
    .toLowerCase()
    .replace(/[^a-z0-9-_ ]+/g, "")
    .replace(/\s+/g, "-");

  urlOutput.value = urlFriendlyText;
}

function AddUpdateBlogTagForm() {
  // var BlogName = $("#BlogName").val();

  // if (BlogName == "") {
  //   ProductAlert("Please Enter Blog Name");
  //   return false;
  // }

  // var BlogImg = document.getElementById("BlogImg");
  // var old_blog_img = document.getElementById("old_blog_img");

  // if (old_blog_img == "") {
  //   if (!BlogImg.value) {
  //     ProductAlert("Please Upload Blog Banner.");
  //     return false;
  //   }
  // }

  let myForm = document.getElementById("tag_form");
  var formData = new FormData(myForm);

  $("#addBlogTagBtn").html("Please Wait..");
  $.ajax({
    url: "action/blog-form-action.php",
    type: "POST",
    data: formData,
    success: function (data) {
      var response = JSON.parse(data);
      ProductAlert(response.message);
      if (response.error == false) {
        setInterval(function () {
          location.reload();
        }, 1500);
        $("#addBlogBtn").html("Add");
        $("#blog_form")[0].reset();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  return false;
}
