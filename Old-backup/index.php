<?php

require_once('./admin/include/autoloader.inc.php');

$dbh=new Dbh();

$conn=$dbh->_connectodb();

$core =new Core($conn);

$IMSSetting=new IMSSetting($conn);

$AllSevaye=$IMSSetting->AllSevaye();
$gallery_obj=new Gallery($conn);
$AllGallery=$gallery_obj->GetAllGalleryNew();
$AllVideo=$gallery_obj->GetAllVideoNew();

?>

<!DOCTYPE html>

<html lang="en">

   <head>

      <?php include('include/meta.php') ?>

      <title>Daya Bhawna Foundation</title>

      <?php include('include/link.php') ?>

   </head>

   <body>

      <!-- Hedaer start -->

      <?php include('include/header.php') ?>

      <!-- Header End -->

      <!-- banner start -->

      <section class="banner_section">

      </section>

      <section class="slider_banner">

         <div class="container-fluid">

            <div class="banner_owl owl-carousel">

               <div>
<a href="<?php echo $website_url;?>/hospital?SevayeID=MQ==">
                  <img src="<?php echo $website_url;?>/assets/images/home/website-banner-1.webp" alt="DayaBhawnaFoundation-Banner-1"

                     class="banner_img">
</a>
               </div>

               <div>
<a href="<?php echo $website_url;?>/annadanam?SevayeID=NQ==">
                  <img src="<?php echo $website_url;?>/assets/images/home/website-banner-2.webp" alt="DayaBhawnaFoundation-Banner-2"

                     class="banner_img">
</a>
               </div>

               <div>
<a href="<?php echo $website_url;?>/human-service?SevayeID=Nw==">
                  <img src="<?php echo $website_url;?>/assets/images/home/website-banner-3.webp" alt="DayaBhawnaFoundation-Banner-3"

                     class="banner_img">
</a>
               </div>

               <div>
                   <a href="<?php echo $website_url;?>/medicine-donation?SevayeID=OA==">
                  <img src="<?php echo $website_url;?>/assets/images/home/website-banner-4.webp" alt="DayaBhawnaFoundation-Banner-4"

                     class="banner_img">
                   </a>
               </div>

               <div>
                  <a href="<?php echo $website_url;?>/jhansi-hospital">
                  <img src="<?php echo $website_url;?>/assets/images/home/website-banner-6.webp" alt="DayaBhawnaFoundation-Banner-6"

                     class="banner_img">
</a>
               </div>



            </div>

         </div>

      </section>

      <!-- banner End -->

      <!-- दया भावना फाउण्डेशन start -->

      <section class="bg_color_white">

         <div class="container-fluid">

            <div class="row flex_alignBox mt-2  revese_colm">

               <div class="col lg-6 col-md-6 col-sm-6 col-12 col-xs-12">

                  <div class="animal_box">

                     <img src="<?php echo $website_url;?>/assets/images/home/animal.png" alt="DayaBhawnaFoundation-Animal" class="animal_img">

                  </div>

               </div>

               <div class="col lg-6 col-md-6 col-sm-6 col-12 col-xs-12">

                  <div>

                     <h1 class="heading_title" style="text-align: left;">दया भावना फाउण्डेशन</h1>

                     <h3 class="subtitle_headingg">अहिंसा  महातीर्थ</h3>


                     <p class="description_data">
संपूर्ण भारतवर्ष में लगभग छह लाख पचास हज़ार ग्राम बसे हुए हैं। इस पवित्र भूमि पर तीस करोड़ से भी अधिक गौवंश निवास करता है — और असंख्य अन्य पशु-पक्षियों की तो कोई गणना ही नहीं। किन्तु विडंबना देखिए —
                     <span class="dots">...</span>
  <span class="more-text">
    इतने विशाल जीवजगत के लिए देशभर में ऐसा कोई अस्पताल नहीं, जहाँ इन निर्दोष जीवों को समय पर अत्याधुनिक उपचार-सुविधाएँ और पूर्ण स्वास्थ्य-लाभ तक देखभाल प्राप्त हो सके।

यदि भारत के एक सौ चालीस करोड़ जनों से पूछा जाए — “जब आपके मार्ग में कोई घायल पशु या पक्षी दिखे, क्या कोई ऐसा स्थान है जहाँ उसका उपचार सुनिश्चित हो?” तो शायद ही कोई इस प्रश्न का उत्तर दे पाएगा।

मनुष्य ने अपने उपचार और सुविधा के लिए असंख्य प्रगति और साधन निर्मित किए — परंतु वही संवेदना, वही प्रयास इन मूक प्राणियों के लिए आज भी अनुपस्थित है।

परम पूज्य मुनिश्री अविचल सागर जी महाराज की करुणा और मंगल प्रेरणा से अब इस स्थिति को बदलने का संकल्प लिया गया है।

 मुनि अविचल सागर जी की करुणामयी दृष्टि से प्रेरित होकर भारतवर्ष के प्रत्येक राष्ट्रीय राजमार्ग पर प्रत्येक 150 से 200 किलोमीटर के अंतराल पर 108 गौ-अस्पताल निर्माण का लक्ष्य निर्धारित किया गया है।

यह केवल एक सेवा नहीं — यह अहिंसा परमो धर्म की जीवंत व्याख्या है।

भगवान महावीर और भगवान राम की पावन शिक्षाओं से प्रेरणा लेकर यह योजना उन सभी जीवों के लिए है जो अनंत काल से इस धरती पर विचरते आए हैं — ताकि वे मृत्यु-तुल्य पीड़ा से मुक्त होकर पूर्ण स्वास्थ्य प्राप्त करें।

यह दया, भावना और करुणा का एक अद्भुत संगम है — जो भारतभूमि की आत्मा को पुनः स्पंदित करेगा।
  </span>
  <span class="read-toggle" onclick="toggleReadMore(this)">Read more</span>
                     </p>


                     <a href="<?php echo $website_url;?>/assets/pdf/parichay-patrika.pdf" class="link_primary">और जाने</a>
                      <a href="<?php echo $website_url;?>/assets/pdf/page_patrika.pdf" class="link_Channge" target="_blank">अस्पताल देखेे</a>


                  </div>

               </div>

            </div>

         </div>

         <div class="bottom_style">

            <img src="<?php echo $website_url;?>/assets/images/home/bottomGraph.png" alt="DayaBhawnaFoundation-img" class="bottom_img w-100">

         </div>

      </section>

      <!-- दया भावना फाउण्डेशन End -->

      <!-- important Link start -->

      <section class="bg_color_secondary">

         <h1 class="heading_title">इम्पोर्टेन्ट लिंक्स</h1>

         <div class="container-fluid">

            <div class="row imp_link_container">

               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 imp_link_list ">

                  <div class="important_link_box">

                     <img src="<?php echo $website_url;?>/assets/images/home/important-1.webp" alt="DayaBhawnaFoundation" class="imp_img_link">

                     <div class="hover_title">

                        <a href="<?php echo $website_url;?>/our-services">Donation</a>

                     </div>

                  </div>

               </div>

               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 imp_link_list">

                  <div class="important_link_box">

                     <img src="<?php echo $website_url;?>/assets/images/home/important-2.webp" alt="DayaBhawnaFoundation" class="imp_img_link">

                     <div class="hover_title">

                        <a href="<?php echo $website_url;?>/about-us.php">Introduction</a>

                     </div>

                  </div>

               </div>

               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 imp_link_list">

                  <div class="important_link_box">

                     <img src="<?php echo $website_url;?>/assets/images/home/important-3.webp" alt="DayaBhawnaFoundation" class="imp_img_link">

                     <div class="hover_title">

                        <a href="<?php echo $website_url;?>/gallary">Gallery</a>

                     </div>

                  </div>

               </div>

               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 imp_link_list">

                  <div class="important_link_box">

                     <img src="<?php echo $website_url;?>/assets/images/home/important-4.webp" alt="DayaBhawnaFoundation" class="imp_img_link">

                     <div class="hover_title">

                        <a href="<?php echo $website_url;?>/hospital?SevayeID=MQ==">Hospital</a>

                     </div>

                  </div>

               </div>

            </div>

         </div>

      </section>

      <!-- important link End -->

      <!-- newlatter start -->

      <?php include('include/donation.php') ?>

      <!-- newlatter end -->

      <!-- our services start-->

      <section class="bg_color_transparent">

         <h1 class="heading_title">हमारी सेवाएं</h1>

         <div class="container-fluid">

            <div class="row ">

                <?php foreach($AllSevaye as $sevaye){?>

                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 imp_link_list ">

                  <div class="service_box">

                     <div class="service_img">

                        <img src="<?php echo $website_url;?>/admin/<?php echo $sevaye['Image']?>" alt=<?php echo $sevaye['Name']?>

                           class="Daya_service">

                     </div>

                     <div class="our_service_link">

                        <a href="<?php echo $website_url . '/' . $sevaye['PageUrl'] . '?SevayeID=' . base64_encode($sevaye['ID']); ?>">

                        <?php echo $sevaye['Name']; ?>

                    </a>



                     </div>

                  </div>

               </div>

                <?php } ?>

               <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 imp_link_list ">

                  <div class="service_box">

                     <div class="service_img">

                        <img src="<?php echo $website_url;?>/assets/images/home/service1.webp" alt="DayaBhawnaFoundation-service-1"

                           class="Daya_service">

                     </div>

                     <div class="our_service_link">

                        <a href="<?php echo $website_url;?>/hospital.php">आचार्य विद्यासागर गौ अस्पताल</a>

                     </div>

                  </div>

               </div>

               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 imp_link_list">

                  <div class="service_box">

                     <div class="service_img">

                        <img src="<?php echo $website_url;?>/assets/images/home/service2.webp" alt="DayaBhawnaFoundation-service-2"

                           class="Daya_service">

                     </div>

                     <div class="our_service_link">

                        <a href="#">भगवान श्री राम पक्षी अस्पताल</a>

                     </div>

                  </div>

               </div>



                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 imp_link_list">

                  <div class="service_box">

                     <div class="service_img">

                        <img src="<?php echo $website_url;?>/assets/images/home/service3.webp" alt="DayaBhawnaFoundation-service-3"

                           class="Daya_service">

                     </div>

                     <div class="our_service_link">

                        <a href="<?php echo $website_url;?>/annadanam.php">खिचड़ी <br> वितरण</a>

                     </div>

                  </div>

               </div>



               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-6 imp_link_list">

                  <div class="service_box">

                     <div class="service_img">

                        <img src="<?php echo $website_url;?>/assets/images/home/service4.webp" alt="DayaBhawnaFoundation-service-4"

                           class="Daya_service">

                     </div>

                     <div class="our_service_link">

                        <a href="<?php echo $website_url;?>/human-service.php">मानव <br> सेवा</a>

                     </div>

                  </div>

               </div> -->







            </div>

         </div>

      </section>

      <!-- our secvices End -->

      <!-- about hospital start-->

      <section class="primary_backgrond">

         <div class="container-fluid">

            <div class="hospital_child_box">

               <h1 class="heading_title" style="color:#fff !important;text-align:left !important">आचार्य विद्यासागर गौ

                  उपचार अस्पताल

               </h1>

               <p class="description_data" style="color:#fff !important">

                  मनुष्यों ने अपने स्वयं के उपचार के लिये पर्याप्त सुविधाओं का निर्माण किया है परन्तु मूक, अनाश्रित,

                  आवारा दुर्घटनाग्रस्त पशुओं के लिये अत्याधुनिक उपचार सुविधा उपलब्ध नहीं हैं । पशु पक्षी भूख, प्यास,

                  सर्दी, गर्मी की पीड़ा तो सहन कर ही रहे है, लेकिन उनके घाव - जख्मों पर एक चुटकी हल्दी लगाने वाला भी

                  कोई नही है । हर जगह पशु पक्षियों को प्रताड़ित एवं कष्टप्रद होकर जीवन गुजारना पड़ रहा है ।

               </p>

               <p class="description_data" style="color:#fff !important">

                  मनुष्य अपने चहुँमुखी विकास को साकार करने के लिये बड़े-बड़े मार्गों (हाइवे ) का निर्माण कर रहा है उन

                  मार्गों पर ट्रक, ट्रेक्टर, ट्राला, डम्पर आदि वाहनों द्वारा पशुओं का घायल होना आम बात है जिसमें

                  जानवरों के पैरों का कुचला जाना, हड्डी टूटना, गहरे घाव हो जाना, स्थाई विकलांगता के दर्द से इन गौ वंश

                  को प्रतिदिन गुजरना पड़ रहा है, अहिंसा परमो धर्म को जयवंत करने वाले मुनि श्री 108 अविचल सागर महाराज

                  जी की मंगल प्रेरणा एवं करुणामयी विचारों से दया भावना फाउण्डेशन आचार्य विद्यासागर गौ उपचार अस्पताल

                  एवं श्रीराम पक्षी अस्पताल का निर्माण करने जा रहा है ।

               </p>

               <a href="<?php echo $website_url;?>/hospital?SevayeID=MQ==" class="link_white link_hoverChannge">और जाने</a>

               <a href="<?php echo $website_url;?>/assets/pdf/page_patrika.pdf" class="link_Channge" target="_blank">अस्पताल देखेे</a>

               <img src="<?php echo $website_url;?>/assets/images/home/aboutHospital.png" alt="DayaBhawnaFoundation-Hospital"

                  class="hospital_img">

            </div>

         </div>

      </section>

      <!-- about hospital end -->

      <!-- start Gallary -->

      <section class="bg_color_secondary" id="gallary">

         <div class="container-fluid">

            <h1 class="heading_title">गैलरी</h1>

            <p class="description_data text-center mb-5">मनुष्यों ने अपने स्वयं के उपचार के लिये पर्याप्त सुविधाओं का

               निर्माण किया है परन्तु मूक, अनाश्रित, आवारा दुर्घटनाग्रस्त पशुओं के लिये अत्याधुनिक उपचार सुविधा उपलब्ध

               नहीं हैं । पशु पक्षी भूख, प्यास, सर्दी, गर्मी की पीड़ा तो सहन कर ही रहे है, लेकिन उनके घाव - जख्मों पर

               एक चुटकी हल्दी लगाने वाला भी कोई नही है । हर जगह पशु पक्षियों को प्रताड़ित एवं कष्टप्रद होकर जीवन

               गुजारना पड़ रहा है ।

            </p>

            <div class="row">

            <?php foreach($AllGallery as $gallery){?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div>
                     <img src="<?php echo $website_url;?>/admin/uploads/<?php echo $gallery['GalleryImage'];?>" alt="DayaBhawnaFoundation-Gallary-1"
                        class="gallary_img rounded">
                  </div>
               </div>
                <?php }?>

               <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">

                  <div>

                     <img src="<?php echo $website_url;?>/assets/images/home/gallar1.webp" alt="DayaBhawnaFoundation-Gallary-1"

                        class="gallary_img">

                  </div>

               </div>

               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">

                  <div>

                     <img src="<?php echo $website_url;?>/assets/images/home/gallar2.webp" alt="DayaBhawnaFoundation-Gallary-2"

                        class="gallary_img">

                  </div>

               </div>

               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12">

                  <div>

                     <img src="<?php echo $website_url;?>/assets/images/home/gallar3.webp" alt="DayaBhawnaFoundation-Gallary-3"

                        class="gallary_img">

                  </div>

               </div> -->

            </div>

            <div class="button_link_bottom">

               <a href="<?php echo $website_url;?>/gallary" class="link_Channge">और देखे</a>

            </div>

         </div>

      </section>

      <!-- end Gallary -->

      <!-- youtube start -->

      <section class="bg_color_transparent">

         <div class="container-fluid">

            <h1 class="heading_title">VIDEO</h1>

            <div class="utube_owl owl-carousel">


               <?php foreach($AllVideo as $Video){?>
                 <div>
                  <iframe width="100%" height="236px"
                     src="https://www.youtube.com/embed/<?php echo $Video['VideoCode'];?>"
                     title="YouTube video player" frameborder="0"
                     allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                     referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
               </div>
                <?php }?>

               <!-- <div>

                  <iframe width="100%" height="236px" src="https://www.youtube.com/embed/cPHqxQLY9cE?si=yMDMlqGdpWz3aHfM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

               </div>

               <div>

                  <iframe width="100%" height="236px" src="https://www.youtube.com/embed/ZpOlCz7UKX0?si=VznQJd_4OzyMaVVb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

               </div>

               <div>

                  <iframe width="100%" height="236px" src="https://www.youtube.com/embed/VO22gFA7Zdg?si=RfNBmek-ck9hBPAb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

               </div>

               <div>

                   <iframe width="100%" height="236px" src="https://www.youtube.com/embed/HSDKscNvEYE?si=nlhZoGJPJ7KIi6qC" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

               </div>

               <div>

                   <iframe width="100%" height="236px" src="https://www.youtube.com/embed/lsLnjpFIx1I?si=fDqWV3Y5znmBBDRu" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

               </div> -->

            </div>

            <div class="button_link_bottom">

               <a href="<?php echo $website_url;?>/gallary" class="link_primary">और देखे</a>

            </div>

         </div>

      </section>

      <!-- youtube End -->

      <!-- review start -->

      <?php include('include/testimonial.php') ?>

      <!-- review end -->

      <!-- Bank more Details Start-->

    <?php include('include/bankdetails.php') ?>

    <!-- Bank more Details End -->

      <!-- footer start -->

      <?php include('include/footer.php') ?>

      <!-- footer end -->

      <!-- script start-->

      <?php include('include/script.php') ?>

      <!-- script end-->

       <script>
  function toggleReadMore(el) {
    const parent = el.parentElement;
    const dots = parent.querySelector('.dots');
    const moreText = parent.querySelector('.more-text');

    if (dots.style.display === "none") {
      dots.style.display = "inline";
      moreText.style.display = "none";
      el.textContent = " Read more";
    } else {
      dots.style.display = "none";
      moreText.style.display = "inline";
      el.textContent = " Read less";
    }
  }
</script>

   </body>

</html>