$(document).ready(function () {
  var i = 1;
  $("#all_events").dataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    ordering: false,
    serverMethod: "post",
    ajax: {
      url: "ajax/view-all-events-post.php",
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
        data: "EventBanner",
      },
      {
        data: "EventName",
      },
      {
        data: "Description",
      },
      {
        data: "EventDateTime",
      },
      {
        data: "Action",
      },
    ],
  });
});

function AddEvent() {
  $("#form_action").val("add");
  $("#event_form")[0].reset();
  $("#add_event").modal("show");
  $("#addEventBtn").html("Add");
  $("#EventHeading").html("Add Event");
  $("#form_id").val("-1");
  $(".fc-datepicker").datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    // locale: {
    //   format: "YYYY-MM-DD",
    // },
  });
}

function UpdateEvent_modal(event_id) {
  $("#addEventBtn").html("Update");
  $("#EventHeading").html("Update Event");

  $.post(
    "ajax/get_events_details.php",
    {
      ID: event_id,
    },
    function (data, status) {
      var response = JSON.parse(data);
      if (response.error == false) {
        $("#EventName").val(response.data.EventName);
        $("#old_event_img").val(response.data.EventImg);
        $("#Url").val(response.data.Url);
        $("#EventStartDate").val(response.data.EventStartDate);
        $("#EventEndDate").val(response.data.EventEndDate);
        $("#EventBooth").val(response.data.EventBooth);
        $("#EventDescription").val(response.data.EventDescription);
        $("#form_action").val("Update");
        $("#form_id").val(event_id);
      }
    }
  );
  $("#add_event").modal("show");
}

function AddUpdateEventForm() {
  var EventName = $("#EventName").val();

  if (EventName == "") {
    ProductAlert("Please Enter Event Name");
    return false;
  }

  var EventImg = document.getElementById("EventImg");
  var old_event_img = document.getElementById("old_event_img");

  if (old_event_img == "") {
    if (!EventImg.value) {
      ProductAlert("Please Upload Event Banner.");
      return false;
    }
  }

  // var Url = $("#Url").val();

  // if (Url == "") {
  //   ProductAlert("Please Enter Event Url");
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

  let myForm = document.getElementById("event_form");
  var formData = new FormData(myForm);

  $("#addEventBtn").html("Please Wait..");
  $.ajax({
    url: "action/event-form-action.php",
    type: "POST",
    data: formData,
    success: function (data) {
      var response = JSON.parse(data);
      ProductAlert(response.message);
      if (response.error == false) {
        setInterval(function () {
          location.reload();
        }, 1500);
        $("#addEventBtn").html("Add");
        $("#event_form")[0].reset();
      }
    },
    cache: false,
    contentType: false,
    processData: false,
  });
  return false;
}

function DeleteEvent(event_id) {
  alertify.confirm(
    _ProductName,
    "Do you really want to delete Event?",
    function () {
      $.post(
        "action/delete-event.php",
        {
          ID: event_id,
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
const headingInput = document.getElementById("EventName");

function generateUrl() {
  const headingText = headingInput.value;
  const urlFriendlyText = headingText
    .trim()
    .toLowerCase()
    .replace(/[^a-z0-9-_ ]+/g, "")
    .replace(/\s+/g, "-");

  urlOutput.value = urlFriendlyText;
}
