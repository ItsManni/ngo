<?php
$donationName = '';
$amount = '';
$category_name = '';
$showGenericForm = false;

if (!isset($_GET['token']) || empty($_GET['token'])) {
    $showGenericForm = true;
} else {
    $decoded = json_decode(base64_decode($_GET['token']), true);

    if (!is_array($decoded) || empty($decoded['donation_name']) || empty($decoded['amount']) || empty($decoded['category_name'])) {
        $showGenericForm = true;
    } else {
        $donationName = $decoded['donation_name'];
        $amount       = $decoded['amount'];
        $category_name = $decoded['category_name'];
    }
}
?>


<!DOCTYPE html>

<html lang="en">

   <head>

      <?php include('include/meta.php') ?>

      <title>Donation</title>

      <?php include('include/link.php') ?>

      <link rel="stylesheet" media="screen, print"

         href="<?php echo $website_url; ?>/assets/plugins/alertifyjs/css/alertify.css">

      <link rel="stylesheet" media="screen, print"

         href="<?php echo $website_url; ?>/assets/plugins/alertifyjs/css/themes/default.min.css">

   </head>

   <body>

      <!-- Hedaer start -->

      <?php include('include/header.php') ?>

      <!-- Header End -->

      <!-- Our Service start -->

       <section class="bg_color_transparent">

         <div class="container-fluid">

            <h1 class="heading_title">डोनेट करें</h1>

            <div>

               <div class="row" style="display:flex;justify-content:center;">
    <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
        <?php if ($showGenericForm): ?>
            <!-- Generic form -->
            <form id="donationForm">
                <div class="form_bg">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <input type="text" placeholder="Name" id='name' name='name' class="inpt_style">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <input type="text" placeholder="Email" id='email' name='email' class="inpt_style">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <input type="tel" placeholder="Mobile" id='phone' name='phone' class="inpt_style">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <select name="donation" id="donation" class="inpt_style">
                                    <option value="">Donation</option>
                                    <option value="औषधि दान">औषधि दान</option>
                                    <option value="गौ अस्पताल">गौ अस्पताल</option>
                                    <option value="मानव सेवा">मानव सेवा</option>
                                    <option value="खिचड़ी वितरण">खिचड़ी वितरण</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <input type="text" placeholder="Price" id='amount' name='amount' class="inpt_style">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <textarea name="message" id="message" placeholder="Your Address" class="inpt_style"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <button type='submit' class="submitBtn_query">डोनेट करें</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php else: ?>
            <!-- Pre-filled token form -->
            <form id="donationForm">
                <div class="form_bg">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <input type="text" placeholder="Name" id='name' name='name' class="inpt_style">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <input type="text" placeholder="Email" id='email' name='email' class="inpt_style">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <input type="tel" placeholder="Mobile" id='phone' name='phone' class="inpt_style">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <input type="text" id="donation" name="donation" class="inpt_style" placeholder="Donation"
                                       value="<?php echo htmlspecialchars($donationName, ENT_QUOTES, 'UTF-8'); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <input type="text" id="amount" name="amount" class="inpt_style" placeholder="Price"
                                       value="<?php echo htmlspecialchars($amount, ENT_QUOTES, 'UTF-8'); ?>"
                                       <?php echo ($category_name === 'खिचड़ी वितरण') ? 'readonly' : ''; ?>>
                            </div>
                        </div>
                        <input type="hidden" name="category_name" value="<?php echo htmlspecialchars($category_name, ENT_QUOTES, 'UTF-8'); ?>" readonly>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <textarea name="message" id="message" placeholder="Your Address" class="inpt_style"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                            <div class="input_box">
                                <button type='submit' class="submitBtn_query">डोनेट करें</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>


            </div>

         </div>

      </section>

      <!-- Our service  End -->

      <!-- Bank more Details Start-->

      <?php include('include/bankdetails.php') ?>

      <!-- Bank more Details End -->

      <!-- newlatter start -->

      <?php include('include/donation.php') ?>

      <!-- newslatter End -->

      <!-- review start -->

      <?php include('include/testimonial.php') ?>

      <!-- review end -->

      <!-- footer start -->

      <?php include('include/footer.php') ?>

      <!-- footer end -->

      <!-- script start-->

      <?php include('include/script.php') ?>

      <!-- script end-->

      <!-- Alertify -->

      <script src="<?php echo $website_url; ?>/assets/plugins/alertifyjs/alertify.js"></script>

      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

      <script>

         // document.getElementById('donationForm').onsubmit = async function (e) {

         

         // e.preventDefault();

         

         // const formData = new FormData(this);

         

         

         

         // const res = await fetch("donation-init.php", {

         

         //     method: "POST",

         

         //     body: formData

         

         // });

         

         // const data = await res.json();

         

         

         

         // if (data.status === "success") {

         

         //     const options = {

         

         //     key: data.key,

         

         //     amount: data.amount,

         

         //     currency: "INR",

         

         //     name: "Donation",

         

         //     description: "Thank you for your support!",

         

         //     order_id: data.order_id,

         

         //     handler: function (response) {

         

         //         window.location.href = `donation-status.php?payment_id=${response.razorpay_payment_id}&order_id=${response.razorpay_order_id}`;

         

         //     },

         

         //     prefill: {

         

         //         name: formData.get("name"),

         

         //         email: formData.get("email"),

         

         //         contact: formData.get("phone")

         

         //     },

         

         //     theme: { color: "#3399cc" }

         

         //     };

         

         //     const rzp = new Razorpay(options);

         

         //     rzp.open();

         

         // } else {

         

         //     alert("Error: " + data.message);

         

         // }

         

         // };

         document.getElementById('donationForm').onsubmit = async function (e) {

         e.preventDefault();

         

         // Fetch input values

         const name = document.getElementById('name').value.trim();

         const email = document.getElementById('email').value.trim();

         const phone = document.getElementById('phone').value.trim();

         const donation = document.getElementById('donation').value.trim();

         const amount = document.getElementById('amount').value.trim();

         

         // Validation

         if (name.length < 1) {

             Alert("Please enter name");

             return;

         }

         

         /*const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

         if (!emailPattern.test(email)) {

             Alert("Please enter a valid email");

             return;

         }*/

         

         const phonePattern = /^[6-9]\d{9}$/;

         if (!phonePattern.test(phone)) {

             Alert("Please enter a valid 10-digit mobile number");

             return;

         }

         

         if (donation === "") {

             Alert("Please select a donation type");

             return;

         }

         

         if (isNaN(amount) || Number(amount) <= 0) {

             Alert("Please enter a valid donation amount");

             return;

         }

         

         // Prepare data and send request

         const formData = new FormData(this);

         

         try {

             const res = await fetch("donation-init.php", {

                 method: "POST",

                 body: formData

             });

         

             const data = await res.json();

         

             if (data.status === "success") {

                 const options = {

                     key: data.key,

                     amount: data.amount,

                     currency: "INR",

                     name: "Donation",

                     description: "Thank you for your support!",

                     order_id: data.order_id,

                     handler: function (response) {

                         window.location.href = `donation-status.php?payment_id=${response.razorpay_payment_id}&order_id=${response.razorpay_order_id}`;

                     },

                     prefill: {

                         name: formData.get("name"),

                         email: formData.get("email"),

                         contact: formData.get("phone")

                     },

                     theme: { color: "#3399cc" }

                 };

         

                 const rzp = new Razorpay(options);

                 rzp.open();

         

             } else {

                 Alert("Error: " + data.message);

             }

         

         } catch (error) {

             console.error("Fetch error:", error);

             Alert("Something went wrong. Please try again later.");

         }

         };

      </script>

   </body>

</html>