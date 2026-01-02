// function AddLeadSource() {



//   $("#SocialHeading").html("Add Social Media");



//   $("#social_form_action").val("add");



//   $("#modal_lead_source").modal("show");



// }







function AddUpdateWebsiteForm() {







  let myForm = document.getElementById("website_info");



  var formData = new FormData(myForm);







  $("#WebsiteInfoBtn").html("Please Wait..");



  $.ajax({



    url: "action/add_update_website_info.php",



    type: "POST",



    data: formData,



    success: function (data) {



      var response = JSON.parse(data);



      ProductAlert(response.message);



      if (response.error == false) {



        setInterval(function () {



          location.reload();



        }, 1500);



        $("#WebsiteInfoBtn").html("Add");



        $("#website_info")[0].reset();



      }



    },



    cache: false,



    contentType: false,



    processData: false,



  });



  return false;



}



function openSevayeModal() {

    $('#sevayeForm')[0].reset();

    $('#sevayeModal').modal('show');

}



function SaveSevayeData() {



    var pageurl=$("#page_url").val();

    var actionType = $('#sevayeForm_action').val(); 

    var service_name = $('#service_name').val().trim();

    var service_image = $('#service_image').val().trim();

    if (service_name === '') {

        ProductAlert('Please Enter Name');

        return;

    }

     if (actionType === 'add' && service_image === '') {

        ProductAlert('Please Select an Image');

        return;

    }



    if(pageurl=='')

    {

        ProductAlert('इस पेज का URL दें');

        return;



    }

    var formData = new FormData($('#sevayeForm')[0]);

    $.ajax({

        url: 'action/add_update_sevaye.php',

        type: 'POST',

        data: formData,

        contentType: false,

        processData: false, 

        beforeSend: function () {

            $('#sevayeBtnId').prop('disabled', true).text('Saving...');

        },

        success: function (response) {

            $('#sevayeBtnId').prop('disabled', false).text('Save');

                var res = JSON.parse(response);

                if (res.error== false) {

                    ProductAlert(res.message);

                     $('#sevayeForm')[0].reset();

                      $('#sevayeForm_action').val('add');

                      $('#sevayeForm_action_value').val('-1');

                      // $('#imagePreview').remove();

                      $('#sevayeModal').modal('hide');



                      // Reload DataTable

                      $('#hamari_sevaye').DataTable().ajax.reload();

                } else {

                    ProductAlert(res.message || 'Something went wrong');

                }

        },

        error: function () {

            $('#sevayeBtnId').prop('disabled', false).text('Save');

            ProductAlert('Error saving service');

        }

    });

}





$(document).ready(function() {

    $('#hamari_sevaye').DataTable({

        "processing": true,

        "serverSide": true,

        "ajax": {

            "url": "ajax/get_hamari_sevaye_post.php",

            "type": "POST"

        },

        "columns": [

            { "data": "id" },

            { "data": "Name" },

            { "data": "Image" },

            { "data": "Action" }

        ]

    });

});





function EditSevaye(id) {

    $.ajax({

        url: "ajax/get_single_sevaye.php",

        type: "POST",

        data: { id: id },

        dataType: "json",

        success: function (res) {

            if (!res.error) {

                $('#service_name').val(res.Name);

                $('#sevayeForm_action').val('update');

                $('#sevayeForm_action_value').val(res.ID);

                $('#page_url').val(res.PageUrl);



                // Show existing image preview

                $('#imagePreview').remove();

                if (res.Image) {

                    $('#service_image').after(`<div id="imagePreview" class="mt-2">

                        <img src="../${res.Image}" width="80" class="border rounded">

                    </div>`);

                }



                $('#sevayeModal').modal('show');

            } else {

                ProductAlert(res.message);

            }

        }

    });

}







function DeleteSevaye(id) {

    if (!confirm("Are you sure you want to delete this service?")) return;



    $.ajax({

        url: "action/delete_sevaye.php",

        type: "POST",

        data: { id: id },

        dataType: "json",

        success: function (res) {

            ProductAlert(res.message);

            if (!res.error) {

                $('#hamari_sevaye').DataTable().ajax.reload();

            }

        }

    });

}

function openSubcategoryModal() {
    $('#subcategoryForm')[0].reset();
    $('#subcategory_action').val('add');
    $('#subcategory_id').val('-1');
    $('#subcategoryModalLabel').text('नई उप-श्रेणी जोड़ें');
    $('#subcategoryModal').modal('show');
    $('#subcategory_image_preview').remove();
}


// ======================================================
// SAVE SUBCATEGORY DATA (ADD / UPDATE)
// ======================================================
function SaveSubcategoryData() {
    var subcategory_name = $('#subcategory_name').val();
    var category_id = $('#category_id').val();
    var page_url = $('#subcategory_page_url').val();
    var actionType = $('#subcategory_action').val();
    var subcategory_image = $('#subcategory_image').val();

    if (category_id === '') {
        ProductAlert('कृपया श्रेणी चुनें (Please select a category)');
        return;
    }
    if (subcategory_name === '') {
        ProductAlert('कृपया उप-श्रेणी का नाम दर्ज करें (Please enter subcategory name)');
        return;
    }
    if (actionType === 'add' && subcategory_image === '') {
        ProductAlert('कृपया एक तस्वीर चुनें (Please select an image)');
        return;
    }
   
    var formData = new FormData($('#subcategoryForm')[0]);

    $.ajax({
        url: 'action/add_update_subcategory.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $('#subcategoryBtn').prop('disabled', true).text('Saving...');
        },
        success: function (response) {
            $('#subcategoryBtn').prop('disabled', false).text('Save');
            var res = JSON.parse(response);
            if (res.error == false) {
                ProductAlert(res.message);
                $('#subcategoryForm')[0].reset();
                $('#subcategory_action').val('add');
                $('#subcategory_id').val('-1');
                $('#subcategoryModal').modal('hide');
                $('#sevaye_subcategory').DataTable().ajax.reload();
            } else {
                ProductAlert(res.message || 'Something went wrong');
            }
        },
        error: function () {
            $('#subcategoryBtn').prop('disabled', false).text('Save');
            ProductAlert('Error saving subcategory');
        }
    });
}


// ======================================================
// LOAD DATATABLE
// ======================================================
$(document).ready(function () {
    $('#sevaye_subcategory').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "ajax/get_sevaye_subcategory.php",
            "type": "POST"
        },
        "columns": [
            { "data": "id" },
            { "data": "CategoryName" },
            { "data": "SubcategoryName" },
            { "data": "SubcategoryImage" },
             { "data": "Priority" },
            { "data": "Action" }
        ],
         "responsive": true, // ✅ enables responsive layout
        "autoWidth": false, // ✅ prevents fixed column width issues
    });
});


// ======================================================
// EDIT SUBCATEGORY
// ======================================================
function EditSubcategory(id) {
    $.ajax({
        url: "ajax/get_single_subcategory.php",
        type: "POST",
        data: { id: id },
        dataType: "json",
        success: function (res) {
            if (!res.error) {
                const data = res.data; // <-- get the data object
                $('#category_id').val(data.CategoryID);
                $('#subcategory_name').val(data.SubcategoryName);
                $('#subcategory_page_url').val(data.PageUrl || ''); // optional, check if exists
                $('#subcategory_action').val('update');
                $('#subcategory_id').val(data.ID);
                $('#subcategoryModalLabel').text('उप-श्रेणी संपादित करें');
                $('#priority').val(data.Priority);
                // Show existing image
                $('#subcategory_image_preview').remove();
                if (data.SubcategoryImage) {
                    $('#subcategory_image').after(`
                        <div id="subcategory_image_preview" class="mt-2">
                            <img src="../${data.SubcategoryImage}" width="80" class="border rounded">
                        </div>
                    `);
                }

                $('#subcategoryModal').modal('show');
            } else {
                ProductAlert(res.message);
            }
        }
    });
}


// ======================================================
// DELETE SUBCATEGORY
// ======================================================
function DeleteSubcategory(id) {
    if (!confirm("Are you sure you want to delete this subcategory?")) return;

    $.ajax({
        url: "action/delete_subcategory.php",
        type: "POST",
        data: { id: id },
        dataType: "json",
        success: function (res) {
            ProductAlert(res.message);
            if (!res.error) {
                $('#sevaye_subcategory').DataTable().ajax.reload();
            }
        }
    });
}



