<?php              
  $tokenData = [
       'donation_name' => 'मानव सेवा',
       'amount'        => '200',
       'category_name'   => 'मानव सेवा'
   ];
$token = base64_encode(json_encode($tokenData, JSON_UNESCAPED_UNICODE));
?>

<!DOCTYPE html>

<html lang="en">



<head>

    

    <?php include('include/meta.php') ?>



    <title>मानव सेवा</title>



    <?php include('include/link.php') ?>

    

</head>





<body>

    <!-- Hedaer start -->

    <?php include('include/header.php') ?>

    <!-- Header End -->



    <!-- banner start -->



    <div>

        <img src="<?php echo $website_url;?>/assets/images/home/website-banner-3.webp" alt="DayaBhawnaFoundation-Banner-2"class=" w-100">

    </div>

    <!-- banner end -->



    <!-- hunan Service start -->



    <section class="bg_color_transparent">

        <div class="container-fluid" >

            <div class="row flex_alignBox ">

                <div class="col-lg-7 col-md-7 col-sm-12 col-12 col-xs-12">

                    <div>

                        <h1 class="heading_title" style="text-align:left !important;margin-bottom:30px !important">मानव सेवा</h1>

                        <h4 class="font_24_here">

                           अर्ध विक्षिप्त, मनो रोगी, असहाय निराश्रित जनो की सेवा

                        </h4>



                        <p class="description_data">

                            <b>"सेवा ही सबसे बड़ा धर्म है"</b> <br>

                            



                            दया भावना फाउंडेशन में हमारा मानना है कि <b>हर जीवन मूल्यवान है</b> — चाहे वो किसी बुज़ुर्ग की अकेली ज़िंदगी हो, किसी अनाथ बच्चे की मासूम आँखें, या किसी लाचार व्यक्ति की दवा की ज़रूरत। <br> हमारा उद्देश्य है कि हर असहाय को सहारा मिले, <b>हर ज़रूरतमंद को गरिमा के साथ जीवन जीने का अवसर मिले।</b> <br> <br> <b>किसकी मदद करते हैं हम?</b> <br> <b>पौष्टिक  भोजन</b> प्रति थाली  60rs <br> <b>औषधि दान</b> प्रति किट   200rs

                        </p>

                        <a href="<?php echo $website_url; ?>/donation?token=<?php echo urlencode($token); ?>" class="web_button">डोनेट करें</a>

                    </div>

                </div>

                <div class="col-lg-5 col-md-5 col-sm-12 col-12 col-xs-12">



                    <div class="human_img_box">

                        <img src="<?php echo $website_url;?>/assets/images/human-service.webp" alt="DayaBhawnaFoundation-human-service" class="human_img">

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Human service  End -->







    <!-- other section start -->



        



    <section class="bg_color_secondary">

        <div class="container-fluid">

            <h4 class="font_24_here">

                            सेवा के माध्यम

            </h4>

           

            <div class="flex_boxxx">

                    <ul class="flex_boxxx_list">

                        <li class="description_data">

                            वृद्धाश्रम सहायता

                        </li>

                        <li class="description_data">मेडिकल हेल्पलाइन </li>

                        <li class="description_data">राशन और कपड़े वितरण अभियान </li>

                        <li class="description_data">शिक्षा सामग्री वितरण</li>

                        <li class="description_data">मासिक चिकित्सा शिविर</li>

                    </ul>



            </div>

        </div>

    </section>



    <!-- other section end -->







    <!-- Bank more Details Start-->

    <?php include('include/bankdetails.php') ?>

    <!-- Bank more Details End -->



       

    <!-- youtube videos section start-->

  

    <!-- <div class="bg_color_transparent"></div> -->

    <!-- youtube videos section end -->

    

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

     

</body>



</html>