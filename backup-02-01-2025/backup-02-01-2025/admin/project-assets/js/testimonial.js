$(document).ready(function () {

  var i = 1;

  $("#all_testimonial").dataTable({

    responsive: true,

    processing: true,

    serverSide: true,

    ordering: false,

    serverMethod: "post",

    ajax: {

      url: "ajax/view-all-testimonial-post.php",

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

        data: "Name",

      },

      {

          data: "UserImage",

      },

      {
        data: "Description",

      },
      {
        data: "ApprovalStatus",
        render: function (data, type, row) {
          if (data == 'Approved') {
            return '<span class="badge bg-success">Approved</span>';
          } else if (data == 'Disapproved') {
            return '<span class="badge bg-danger">Disapproved</span>';
          } else if (data == 'Rejected') {
            return '<span class="badge bg-danger">Rejected</span>';
          } else {
            return '<span class="badge bg-warning">Pending</span>';
          }
        }
      },
      {

        data: "Action",

      },

    ],

  });

});



function AddTestimonial() {

  $("#form_action").val("add");

  $("#testimonial_form")[0].reset();

  $("#add_testimonial").modal("show");

  $("#addTestimonialBtn").html("Add");

  $("#TestimonialHeading").html("Add Testimonial");

  $("#form_id").val("-1");

  $(".fc-datepicker").datepicker({

    showOtherMonths: true,

    selectOtherMonths: true,

    // locale: {

    //   format: "YYYY-MM-DD",

    // },

  });

}



function UpdateTestimonial_modal(testimonial_id) {

  $("#addTestimonialBtn").html("Update");

  $("#TestimonialHeading").html("Update Testimonial");



  $.post(

    "ajax/get_testimonial_details.php",

    {

      ID: testimonial_id,

    },

    function (data, status) {

      var response = JSON.parse(data);

      if (response.error == false) {

        $("#Name").val(response.data.Name);

        $("#old_user_img").html(response.data.UserImage);

        $("#Description").val(response.data.Description);

        $("#form_action").val("Update");

        $("#form_id").val(testimonial_id);

      }

    }

  );

  $("#add_testimonial").modal("show");

}



function AddUpdateTestimonialForm() {

  var Name = $("#Name").val();



  if (Name == "") {

    ProductAlert("Please Enter Name");

    return false;

  }



  var UserImage = document.getElementById("UserImage");

  var old_user_img = document.getElementById("old_user_img");



  if (old_user_img == "") {

    if (!UserImage.value) {

      ProductAlert("Please Upload User Image.");

      return false;

    }

  }



  var Description = $("#Description").val();



  if (Description == "") {

    ProductAlert("Please Enter Description");

    return false;

  }



  let myForm = document.getElementById("testimonial_form");

  var formData = new FormData(myForm);



  $("#addTestimonialBtn").html("Please Wait..");

  $.ajax({

    url: "action/testimonial-form-action.php",

    type: "POST",

    data: formData,

    success: function (data) {

      var response = JSON.parse(data);

      ProductAlert(response.message);

      if (response.error == false) {

        setInterval(function () {

          location.reload();

        }, 1500);

        $("#addTestimonialBtn").html("Add");

        $("#testimonial_form")[0].reset();

      }

    },

    cache: false,

    contentType: false,

    processData: false,

  });

  return false;

}



function DeleteTestimonial(testimonial_id) {

  alertify.confirm(

    _ProductName,

    "Do you really want to delete Testimonial?",

    function () {

      $.post(

        "action/delete-testimonial.php",

        {

          ID: testimonial_id,

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

const headingInput = document.getElementById("TestimonialName");



function generateUrl() {

  const headingText = headingInput.value;

  const urlFriendlyText = headingText

    .trim()

    .toLowerCase()

    .replace(/[^a-z0-9-_ ]+/g, "")

    .replace(/\s+/g, "-");



  urlOutput.value = urlFriendlyText;

}



function ApproveTestimonial(testimonial_id) {

  alertify.confirm(

    _ProductName,

    "Do you really want to approve this testimonial?",

    function () {

      $.post(

        "action/approve-testimonial.php",

        {

          ID: testimonial_id,

        },

        function (data, status) {

          var response = JSON.parse(data);

          ProductAlert(response.message);

          if (response.error == false) {

            setInterval(function () {

              $("#all_testimonial").DataTable().ajax.reload();

            }, 2000);

          }

        }

      );

    },

    function () {

      alertify.error("Approval Cancelled");

    }

  );

}



function RejectTestimonial(testimonial_id) {

  alertify.confirm(

    _ProductName,

    "Do you really want to Reject this testimonial?",

    function () {

      $.post(

        "action/reject-testimonial.php",

        {

          ID: testimonial_id,

        },

        function (data, status) {

          var response = JSON.parse(data);

          ProductAlert(response.message);

          if (response.error == false) {

            setInterval(function () {

              $("#all_testimonial").DataTable().ajax.reload();

            }, 2000);

          }

        }

      );

    },

    function () {

      alertify.error("Disapproval Cancelled");

    }

  );

}

