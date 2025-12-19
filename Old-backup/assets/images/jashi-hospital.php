<!DOCTYPE html>

<html la
ng="en">



<head>



    <?php include('include/meta.php') ?>



    <title>Jashi Hospital</title>



    <?php include('include/link.php') ?>

    <style>

        .banner_video{
            height:759px;
        }

    .banner_bottom_section{
        padding-top:0px;
        padding-bottom:80px;
        
    }

    .bg_style_target{
        padding:80px 0px;
    }
        .width_title{
                width: 65%;
    margin: auto;
    line-height: 58px;
        }

        .subttle_box {
            margin-top:50px;
        }
         .subttle_box .font_24_here{
            width: 100%;
         }
         .animate_button_box{
            display: flex
;
    align-items: center;
    justify-content: center;
         }

       

.animate_anchor {
    font-size: 18px;
    padding: 11.5px 66.5px;
    background: none;
    color: #af3d2d;
    transition: .5s all;
    border-radius: 50px;
    margin-top: 10px;
    display: inline-block;
    text-decoration: none;
    border: 2px solid #af3d2d;
    font-weight: bold;
}

  .animate_anchor:hover {
    padding: 11.5px 120px;
    background: linear-gradient(135deg,
        #fff,
        #ffa258,
        #af3d2d,
        #ffa258,
        #fff
      );
     color: #fff;
}

.hero-seccton{
        margin-top: 80px;
    background: #fff;
    border-radius: 30px;
    padding: 50px;
}

.newone_hero  .heading_title, .newone_hero .font_24_here{
    color:#4f2b00;
    width: 100%;
}


.hero-seccton .animal_img{
    width: 100%;
}

.newone_hero  .subtitle_headingg {
    
    color: #ffa258;
}

.newone_hero .link_primary{
    background:none;
    color:#9f4435;
}

.newone_hero .link_Channge{
    color:#ffa258;
    background:#fff;
}

.color_change{
    color:#fff;
}








    </style>

</head>





<body>

    <!-- Hedaer start -->

    <?php include('include/header.php') ?>

    <!-- Header End -->


    <!-- banner start -->

    <div class="banner_video">

        <video autoplay muted loop playsinline width="100%">
            <source src="<?php echo $website_url;?>/assets/images/jashi-banner-video.mp4" type="video/mp4">
            
        </video>
        
    </div>

    <!-- banenr End -->

    <!-- start birds discription  -->


    <section class="banner_bottom_section" style="background:#fcdfc1 url('<?php echo $website_url;?>/assets/images/group-bg.svg');background-size:cover;background-repear:norepeat">
       
        <div class="bg_style_target" style="background:url('<?php echo $website_url;?>/assets/images/header_img_style.svg') ;background-size: cover;"> 
            <div class="container-fluid">
                <div class="text-center">
                    <h1 class="heading_title width_title">
                       आचार्य श्री विद्यासागर गौ अस्पताल भगवान श्री राम पक्षी उपचार अस्पताल
                    </h1>

                    <div class="text-center subttle_box">
                        <h4 class="font_24_here">
                            पुणे के साथ–साथ जीव कमाओ
                        </h4>

                        <p class="description_data">   ग्वालियर, झाँसी, ललितपुर, टीकमगढ़, शिवपुरी, बबालना, हटा, अठीकमगढ़ के उपरांत अब <b>झाँसी में</b></p>

                        <div class="animate_button_box">
                            <a href="#" class="animate_anchor">OFFICIAL INVITATIONS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          
      

       <div class="container-fluid">
            <div class="jashi-videos  owl-carousel">
                
                <div class="videos-items">
                    <video autoplay muted loop playsinline width="100%">
                        <source src="<?php echo $website_url;?>/assets/images/video-item.mp4" type="video/mp4">
    
                    </video>
                </div>  
                <div class="videos-items">
                    <video autoplay muted loop playsinline width="100%">
                        <source src="<?php echo $website_url;?>/assets/images/video-item.mp4" type="video/mp4">
    
                    </video>
                </div> 
                <div class="videos-items">
                    <video autoplay muted loop playsinline width="100%">
                        <source src="<?php echo $website_url;?>/assets/images/video-item.mp4" type="video/mp4">
    
                    </video>
                </div> 
                <div class="videos-items">
                    <video autoplay muted loop playsinline width="100%">
                        <source src="<?php echo $website_url;?>/assets/images/video-item.mp4" type="video/mp4">
    
                    </video>
                </div>   
            </div>
       </div>


       <div class="container-fluid">
            <div class="hero-seccton">
                <div class="row flex_alignBox mt-2  revese_colm">

               <div class="col lg-5 col-md-5 col-sm-6 col-12 col-xs-12">

                  <div class="animal_box">

                     <img src="<?php echo $website_url;?>/assets/images/home/animal.png" alt="DayaBhawnaFoundation-Animal" class="animal_img">

                  </div>

               </div>

               <div class="col-lg-7 col-md-7 col-sm-6 col-12 col-xs-12">

                  <div class="text-center newone_hero">

                     <h1 class="heading_title" >दया भावना फाउण्डेशन</h1>

                     <h3 class="subtitle_headingg">गौ उपचार धाम</h3>

                     <h6 class="pera_heading">"जहां करुणा है, वहां सेवा स्वाभाविक है।"</h6>

                     <p class="description_data">    पद्म पूज्य मुनि श्री अविकल सागर जी के मंगल प्रेरणा से भारत के प्रत्येक राष्ट्रीय महामार्ग पर प्रति 150 से 200 किलोमीटर अंतराल पर गौ अस्पताल निर्माण का लक्ष्य। भगवान महावीर भगवान राम की शिक्षा से अहिंसा परमों धर्म की जायज करते हुए भारत भूमि पर अनंत काल से विचरण करने वाले प्रत्येक पशु पक्षी को पूर्ण स्वस्थ होने पर्यंत उपचार मिले। इस मंगल भावना से मुनि श्री अविकल सागर जी की करुणा मय दृष्टि से जो अनंत जीवों को मृत्यु तुल्य पीड़ा से मुक्त कराएगा।</p>

                     <h4 class="font_24_here">
                        जय श्री महावीर, जय श्री राम
                     </h4>

                     <div>
                        <a href="<?php echo $website_url;?>/assets/pdf/parichay-patrika.pdf" class="link_primary">और जाने</a>
                      <a href="<?php echo $website_url;?>/assets/pdf/page_patrika.pdf" class="link_Channge" target="_blank">अस्पताल देखेे</a>

                     </div>

                  </div>

               </div>

            </div>
            </div>
       </div>
         
    </section>


    <!-- end birds discription  -->

    <section class="banner_bottom_section" style="background:#4f2b00;">
       
        <div class="bg_style_target" style="background:url('<?php echo $website_url;?>/assets/images/header_img_style.svg') ;background-size: cover;"> 
            <div class="container-fluid">
                <div class="text-center">
                    <h1 class="heading_title width_title color_change">
                       - मंगल आशीर्वाद एवं प्रेरणा -
                    </h1>


                    <div class="mangal-slider  owl-carousel ">
                        <div class="card-bnnoxx">
                            <div class="mangal-box-img">
                                <img src="<?php echo $website_url;?>/assets/images/vidha-sagar.png" alt="">
                            </div>
                            <h4 class="position_title">मंगल आशीर्वाद आचार्य </h4>
                            <h4 class="real-name">श्री विद्यासागर जी</h4>


                             
                        </div>

                        <div>
                            <div class="mangal-box-img">
                                <img src="<?php echo $website_url;?>/assets/images/samay-sagar.png" alt="">
                            </div>
                             <h4 class="position_title">मंगल आशीर्वाद आचार्य </h4>
                            <h4 class="real-name">श्री विद्यासागर जी</h4>


                             
                        </div>


                        <div>
                            <div class="mangal-box-img">
                                <img src="<?php echo $website_url;?>/assets/images/sudha-sagar.png" alt="">
                            </div>
                             <h4 class="position_title">मंगल आशीर्वाद आचार्य </h4>
                            <h4 class="real-name">श्री विद्यासागर जी</h4>


                             
                        </div>

                        <div>
                            <div class="mangal-box-img">
                                <img src="<?php echo $website_url;?>/assets/images/sudha-sagar-2.png" alt="">
                            </div>
                             <h4 class="position_title">मंगल आशीर्वाद आचार्य </h4>
                            <h4 class="real-name">श्री विद्यासागर जी</h4>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
          
      

         
    </section>

    <!-- mangal ashirwad start -->



    <!-- mangal ashirwad end -->





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

    <script>
        $('.jashi-videos').owlCarousel({

  loop: false,

  margin: 10,

  nav: false,

  dots: false,

  autoplay: true,

  items: 4,

  // center:true,

  navText: [

    '<span class="fa fa-chevron-left"></span>',

    '<span class="fa fa-chevron-right"></span>'

  ],

  responsive: {

        0: {

          items: 1

        },

        768: {

          items: 2

        },

        1024: {

          items: 4

        }

      }

});

 $('.mangal-slider').owlCarousel({

  loop: false,

  margin: 10,

  nav: false,

  dots: false,

  autoplay: true,

  items: 4,

  // center:true,

  navText: [

    '<span class="fa fa-chevron-left"></span>',

    '<span class="fa fa-chevron-right"></span>'

  ],

  responsive: {

        0: {

          items: 1

        },

        768: {

          items: 2

        },

        1024: {

          items: 4

        }

      }

});
    </script>



</body>



</html>