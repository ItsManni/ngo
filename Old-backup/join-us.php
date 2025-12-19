<!DOCTYPE html>
<html lang="en">

<head>

    <?php include('include/meta.php') ?>

    <title>हमारे साथ जुड़े</title>

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
            <h1 class="heading_title">हमारे साथ जुड़े</h1>

            <div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                        <div class="">
                            <h4 class="font_24_here">DAYABHAWNA FOUNDATION</h4>

                            <ul class="address_list">
                                <li class="address_list_items">
                                    <span>
                                        <img src="<?php echo $website_url;?>/assets/images/icons/location.svg"
                                            alt="DayaBhawnaFoundation-location-icon" class="svg_iconF">
                                    </span>
                                    <h4 class="address_description">
                                        Dayabhawna Foundation and Acharya Vidhya Sagar Gau Upchar Hospital, Sonagir S.O.
                                        Sinawal, Datia, MP-475685
                                    </h4>
                                </li>
                                <li class="address_list_items">
                                    <span>
                                        <img src="<?php echo $website_url;?>/assets/images/icons/world-wide-web.svg"
                                            alt="DayaBhawnaFoundation-world-wide-web-icon" class="svg_iconF">
                                    </span>
                                    <h4 class="address_description">
                                        dayabhawnafoundation@gmail.com
                                    </h4>
                                </li>
                                <li class="address_list_items">
                                    <span>
                                        <img src="<?php echo $website_url;?>/assets/images/icons/phone-call.svg"
                                            alt="DayaBhawnaFoundation-phone-call-icon" class="svg_iconF">
                                    </span>
                                    <h4 class="address_description">
                                        +91-6390255255
                                    </h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                        <form id="join_us_form" onsubmit="return false;">
                            <div class="form_bg">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                                        <div class="input_box">
                                            <input type="text" id='name' name='name' placeholder="Name*" class="inpt_style">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                                        <div class="input_box">
                                            <input type="email" id='email' name='email' placeholder="Email*" class="inpt_style">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class="input_box">
                                            <input type="text" placeholder="Phone Number*" id='phoneNumber' name='phoneNumber' class="inpt_style">
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class="input_box">

                                            <textarea name="message" id="message" placeholder="Enter your message here"
                                                class="inpt_style"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 col-xs-12">
                                        <div class="input_box" >
                                            <button class="submitBtn_query" id="addJoinBtn"
                                                onclick="AddUpdateContactForm()">Submit</button>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Our service  End -->

    <!-- start member details -->

    <section class="bg_color_secondary">
        <div class="container-fluid">
            <h1 class="heading_title" style="text-align: left;">हमारे सदस्य</h1>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-12 col-xs-12">
                    <div class="contact_box_det">
                        <h4 class="contact_name">ग्वालियर अनुपम जैन </h4>
                        <a href="tel:+919425115196" class="contact_num">
                            <img src="<?php echo $website_url;?>/assets/images/icons/phone-call.svg"
                                alt="DayaBhawnaFoundation-phone-call-icon" class="svg_iconF">
                            <span class="num_here"> +91 9425115196 </span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-12 col-xs-12">
                    <div class="contact_box_det">
                        <h4 class="contact_name">शैलेन्द्र जैन</h4>
                        <a href="tel:+919229886887" class="contact_num">
                            <img src="<?php echo $website_url;?>/assets/images/icons/phone-call.svg"
                                alt="DayaBhawnaFoundation-phone-call-icon" class="svg_iconF">
                            <span class="num_here"> +91 9229886887 </span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-12 col-xs-12">
                    <div class="contact_box_det">
                        <h4 class="contact_name">दतिया –सोनागिरी अमित दांगी</h4>
                        <a href="tel:+918319574547" class="contact_num">
                            <img src="<?php echo $website_url;?>/assets/images/icons/phone-call.svg"
                                alt="DayaBhawnaFoundation-phone-call-icon" class="svg_iconF">
                            <span class="num_here"> +91 8319574547 </span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-12 col-xs-12">
                    <div class="contact_box_det">
                        <h4 class="contact_name">झांसी अमीश बड़जात्या</h4>
                        <a href="tel:+916390255255" class="contact_num">
                            <img src="<?php echo $website_url;?>/assets/images/icons/phone-call.svg"
                                alt="DayaBhawnaFoundation-phone-call-icon" class="svg_iconF">
                            <span class="num_here"> +91 6390255255 </span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-12 col-xs-12">
                    <div class="contact_box_det">
                        <h4 class="contact_name">ललितपुर सुमित खजूरिया</h4>
                        <a href="tel:+919450071825" class="contact_num">
                            <img src="<?php echo $website_url;?>/assets/images/icons/phone-call.svg"
                                alt="DayaBhawnaFoundation-phone-call-icon" class="svg_iconF">
                            <span class="num_here"> +91 9450071825 </span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-12 col-xs-12">
                    <div class="contact_box_det">
                        <h4 class="contact_name">अशोकनगर ट्विंकल जैन</h4>
                        <a href="tel:+917566392777" class="contact_num">
                            <img src="<?php echo $website_url;?>/assets/images/icons/phone-call.svg"
                                alt="DayaBhawnaFoundation-phone-call-icon" class="svg_iconF">
                            <span class="num_here"> +91 7566392777 </span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-12 col-xs-12">
                    <div class="contact_box_det">
                        <h4 class="contact_name">बाजना शनि जैन </h4>
                        <a href="tel:+919755791588" class="contact_num">
                            <img src="<?php echo $website_url;?>/assets/images/icons/phone-call.svg"
                                alt="DayaBhawnaFoundation-phone-call-icon" class="svg_iconF">
                            <span class="num_here"> +91 9755791588 </span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-12 col-xs-12">
                    <div class="contact_box_det">
                        <h4 class="contact_name">बामौर कलां मोनू जैन </h4>
                        <a href="tel:+919981048791" class="contact_num">
                            <img src="<?php echo $website_url;?>/assets/images/icons/phone-call.svg"
                                alt="DayaBhawnaFoundation-phone-call-icon" class="svg_iconF">
                            <span class="num_here"> +91 9981048791 </span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-12 col-xs-12">
                    <div class="contact_box_det">
                        <h4 class="contact_name">सतेंद्र जैन </h4>
                        <a href="tel:+919584330374" class="contact_num">
                            <img src="<?php echo $website_url;?>/assets/images/icons/phone-call.svg"
                                alt="DayaBhawnaFoundation-phone-call-icon" class="svg_iconF">
                            <span class="num_here"> +91 9584330374 </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end member details -->


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
        <!-- Alertify -->
    <script src="<?php echo $website_url; ?>/assets/plugins/alertifyjs/alertify.js"></script>
    <script src="<?php echo $website_url; ?>/assets/script/join-us.js"></script>
    <!-- script end-->
    

</body>

</html>