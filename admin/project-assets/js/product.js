$(document).ready(function () {

    $("#nav_all_product").addClass("active");



    $('#all_products').DataTable({

        responsive: true,

        processing: true,

        serverSide: true,

        ordering: false,

        ajax: {

            url: "ajax/view-all-products-post.php",

            type: "POST"

        },

        columns: [

            { data: "id", render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1 },

            { data: "sevaye" },

            { data: "name" },

            { data: "image" },

            { data: "price" },
             {data:"priority"},
            { data: "action" }

        ]

    });

});



// Open modal for Add

function OpenProductModal() {

    $("#productForm")[0].reset();

    $("#form_action").val("add");

    $("#product_id").val("");

    $("#productModalLabel").text("नया प्रोडक्ट जोड़ें");

    $("#productModal").modal("show");

}



// Save product

function SaveProductData() {

     // Collect form values
    let sevayeID = $('#sevaye_id').val();
    let subcategoryID = $('#subcategory_id').val();
    let productName = $('#product_name').val();
    let productPrice = $('#product_price').val();
    let productPriority = $('#product_priority').val();
    let productImage = $('#product_image').prop('files')[0];

    // Validation
    if (!sevayeID) {
        ProductAlert("कृपया सेवा चुनें (Please select a category)");
        return false;
    }
    if (!productName) {
        ProductAlert("कृपया प्रोडक्ट का नाम दर्ज करें (Please enter product name)");
        return false;
    }
    if (!productImage && $('#form_action').val() === 'add') {
        ProductAlert("कृपया प्रोडक्ट इमेज अपलोड करें (Please upload product image)");
        return false;
    }
    if (!productPrice) {
        ProductAlert("कृपया धनराशि दर्ज करें (Please enter product price)");
        return false;
    }
    if (!productPriority) {
        ProductAlert("कृपया प्राथमिकता दर्ज करें (Please enter product priority)");
        return false;
    }

    let formData = new FormData($("#productForm")[0]);

    $.ajax({

        url: "action/add-update-product.php",

        type: "POST",

        data: formData,

        contentType: false,

        processData: false,

        beforeSend: function () {

            $("#saveProductBtn").prop("disabled", true).text("Saving...");

        },

        success: function (response) {

            $("#saveProductBtn").prop("disabled", false).text("सेव करें");

            try {

                let res = JSON.parse(response);

                if (res.error === false) {

                    ProductAlert(res.message);

                     $("#productForm")[0].reset();

                    $("#productModal").modal("hide");

                    $('#all_products').DataTable().ajax.reload();

                } else {

                    ProductAlert(res.message || "Error saving product");

                }

            } catch (e) {

                ProductAlert("Unexpected response: " + response);

            }

        },

        error: function (xhr) {

            $("#saveProductBtn").prop("disabled", false).text("सेव करें");

            ProductAlert("AJAX Error: " + xhr.statusText);

        }

    });

}



// Edit product

function EditProduct(id) {

    $.post("ajax/get-product-post.php", { id: id }, function (data) {

        let product = JSON.parse(data);

        if (product.error) {

            Productalert(product.message);

            return;

        }

        $("#product_id").val(product.id);

        $("#product_name").val(product.name);

        $("#product_price").val(product.price);

        $("#form_action").val("edit");

        $("#sevaye_id").val(product.sevaye_id).trigger("change");
       setTimeout(() => {
    $("#subcategory_id").val(product.subcategory_id).trigger("change");
}, 500);

        if (product.image_url) {

            $("#old_image_preview").html(`

                <div class="mb-2">

                    <img src="${product.image_url}" alt="Product Image" height="80" class="border rounded">

                    <p class="text-muted small mb-1">पुरानी इमेज</p>

                </div>

            `);

        } else {

            $("#old_image_preview").html("");

        }

        $("#product_image").prop("required", false);

        $("#productModalLabel").text("प्रोडक्ट एडिट करें");

        $("#productModal").modal("show");

    });

}





// Delete product

function DeleteProduct(id) {

    if (confirm("क्या आप सच में इस प्रोडक्ट को डिलीट करना चाहते हैं?")) {

        $.post("action/delete-product-post.php", { id: id }, function (response) {

            let res = JSON.parse(response);

            if (res.error === false) {

                ProductAlert(res.message);

                $('#all_products').DataTable().ajax.reload();

            } else {

                ProductAlert(res.message || "Error deleting product");

            }

        });

    }

}

$('#sevaye_id').on('change', function() {
    let categoryID = $(this).val();
    if (categoryID) {
        $.ajax({
            url: 'ajax/get_subcategories.php',
            type: 'POST',
            data: { category_id: categoryID },
            dataType: 'json',
            success: function(res) {
                let $subcat = $('#subcategory_id');
                $subcat.empty();
                $subcat.append('<option value="">-- उप-श्रेणी चुनें --</option>');
                if (!res.error) {
                    res.data.forEach(function(sub) {
                        $subcat.append('<option value="'+sub.ID+'">'+sub.SubcategoryName+'</option>');
                    });
                }
            }
        });
    } else {
        $('#subcategory_id').html('<option value="">-- उप-श्रेणी चुनें --</option>');
    }
});
