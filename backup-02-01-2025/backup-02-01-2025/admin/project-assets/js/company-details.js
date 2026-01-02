    $(document).ready(function() {
        var i = 1;
        $('#Company_details').dataTable({
             responsive: true,
            'processing': true,
            'serverSide': true,
            'ordering': false,
            'serverMethod': 'post',
            'ajax': {
                'url': 'ajax/view-company_post.php'
            },
            'columnDefs': [{
                "targets": [0],
                "className": "text-center"
            }],
            "order": [
                [1, 'asc']
            ],
            'columns': [{
                "data": "id",
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'Center'
                },
                {
                    data: 'CompanyName'
                },
                {
                    data: 'Email'
                },
                {
                    data: 'PhoneNumber'
                },
                {
                    data: 'GSTNumber'
                },
                {
                    data:'Action'
                }


            ]


        });
    });


function AddCompanyDetails() {
  $("#company_details_form")[0].reset();
  $("#add_company_details").modal("show");
  $("#addCompanyDetailsBtn").html("Add");
  $("#CompanyDetailsHeading").html("Add Company Details");
  $("#form_id").val('-1');
}

function UpdateCompanyDetails_modal(Company_id) {
    
  $("#addCompanyDetailsBtn").html("Update");
  $("#CompanyDetailsHeading").html("Update Company Details");

  $.post("ajax/get_company_details.php", {
            ID: Company_id
        },
        function(data, status) {
            var response = JSON.parse(data);
            if(response.error == false)
            {
                $("#company_name").val(response.data.CompanyName);
                $("#company_email").val(response.data.Email);
                $("#company_phone_number").val(response.data.PhoneNumber);
                $("#company_alternative_number").val(response.data.AlternativeNumber);
                $("#company_address").val(response.data.Address);
                $("#company_gst_number").val(response.data.GSTNumber);
                $("#center_id").val(response.data.center_id);

                $("#center_id").select2({
                  placeholder: "Select Center/Branch"
                });
                $("#center_id").select2("val", response.data.CenterID);
                $("#center_id").select2({
                  dropdownParent: $("#add_company_details")
                });

                $("#form_action").val("Update");
                $("#form_id").val(Company_id);
            }
        });
  $("#add_company_details").modal("show");
}


function AddUpdateCompanyDetailsForm()
{
  var company_name = $("#company_name").val();

  if(company_name == ""){
      ProductAlert("Please Enter Company Name.");
      return false;
  }
  var company_email = $("#company_email").val();

  if(company_email == ""){
      ProductAlert("Please Enter Company Email.");
      return false;
  }

  var company_phone_number = $("#company_phone_number").val();

  if(company_phone_number == ""){
      ProductAlert("Please Enter Company Phone Number.");
      return false;
  }

  var company_alternative_number = $("#company_alternative_number").val();

  if(company_alternative_number == ""){
      ProductAlert("Please Enter Company Alternative Number.");
      return false;
  }

  var company_gst_number = $("#company_gst_number").val();

  if(company_gst_number == ""){
      ProductAlert("Please Enter Company GST Number.");
      return false;
  }

  var company_cgst = $("#company_cgst").val();

  if(company_cgst == ""){
      ProductAlert("Please Enter Company CGST Number.");
      return false;
  }

  var company_sgst = $("#company_sgst").val();

  if(company_sgst == ""){
      ProductAlert("Please Enter Company SGST Number.");
      return false;
  }

  var company_igst = $("#company_igst").val();

  if(company_igst == ""){
      ProductAlert("Please Enter Company IGST Number.");
      return false;
  }

  var form_action = $("#form_action").val();
  let btn_name = "";
  if(form_action == 'add'){
    btn_name = 'Add';
  }else{
    btn_name = 'Update';
  }
  
  let myForm = document.getElementById("company_details_form");
  var formData = new FormData(myForm);

  $("#addCompanyDetailsBtn").html("Please Wait..");
  $.ajax({
      url: "action/compnay-details-form-action.php",
      type: "POST",
      data: formData,
      success: function(data) {
          var response = JSON.parse(data);
          ProductAlert(response.message);
          if (response.error == false) {
              setInterval(function() {
                  location.reload();
              }, 1500);
              $("#addCompanyDetailsBtn").html(btn_name);
              $('#company_details_form')[0].reset();
          }else{
            $("#addCompanyDetailsBtn").html(btn_name);
          }
      },
    cache: false,
    contentType: false,
    processData: false,
  });
    return false;
  
}

function DeleteCompany(company_id) {
  alertify.confirm(
    "TechXpert ",
    "Do you really want to delete Company?",
    function () {
      $.post(
        "action/delete-company.php",
        {
          ID: company_id,
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


