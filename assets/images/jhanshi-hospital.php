<!DOCTYPE html>

<html la
ng="en">



<head>



    <?php include('include/meta.php') ?>



    <title>Jhanshi Hospital</title>



    <?php include('include/link.php') ?>

    <style>

        .banner_video{
            height:759px;
        }

        .banner_video video{
            height:100%;
            object-fit:cover !important;
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
    width: 80%;
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


/* new onw */

.card-bnnoxx{
    margin-top:40px;
}

.mangal-box-img img {
    height: 210px;
    width: 210px !important;
    padding: 5px;
    background: #af3d2d;
    border-radius: 50%;
    transition:.5s all;
    margin:auto;
    margin-bottom:20px;
}
.card-bnnoxx:hover .mangal-box-img img{
    background:none;
    padding:0px !important;
    transform: rotateY(180deg);

}
.position_title{

    color:#fff;
    font-weight:400;
}

 .real-name {
    font-weight:bold;
    color:#fff;

 }

 .title_sect{
    background:#492C02;
   padding-bottom:50px;
    text-align:center;
    margin-top:-1px !important;

 }

 .notific_text{
    color:#ffa258;
    margin-bottom:0px;
 }


 section.service_panel {
        position:relative;
        padding: 80px 0px 100px 0px! important;

}
 /* .container_box_serr {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    padding: 80px 0px;
    background: #4f2b00d6;
} */

.empty-ele {
    position: absolute;
    top: 53%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: 480px;
    width: 480px;
    background: none;
    border: 2px dashed #fff;
    border-radius: 50%;
}

.content_ele .row {
    display: flex
;
    justify-content: center;
    align-items:center;
    gap:40px;

}

.img_box_serc{
    text-align:center;
}

.content_ele{
    position:relative;
    z-index:1;
}

.img_box_serc img{
    width: 94%;
    margin:auto;
}
.mrg_top{
    margin-top:50px;
}
.center_img{
        scale: 1.3;
    margin-top: 20px !important;
    margin-bottom: 20px !important;
}

.newlatter_sec, .primary_backgrond{
    background:none !important;
}

.style-differ {
    background: linear-gradient(0deg, #FFA258, #FFF6E0);
}
.title_here_Bank, .newlatter_title{
    color:#9f4435;
    font-weight:bold;
}
.newlatter_sec .flex_alignBox{
    padding: 30px 30px;
    width: 100%;
    border: 2px solid #492C02;
    margin: auto;
    border-radius: 100px;
}

@media (min-width: 768px) and (max-width: 1024px) {
  .banner_video{
        height:432px;
    }

    .revese_colm{
        flex-direction:row !important;
    }
     .bg_style_target{
            background-size: 100% !important;
    background-repeat: no-repeat !important;
    padding:50px 0px;
    }
}


@media(max-width:767px){
    .banner_video{
        height:232px;
    }
    .bg_style_target{
            background-size: 100% !important;
    background-repeat: no-repeat !important;
    padding:50px 0px;
    }

    .width_title{
        width: 100%;
        line-height:38px;
    }
    .hero-seccton{
        margin-top:50px;
    }
    .hero-seccton{
        padding:40px 20px;
    }
    .banner_bottom_section{
        padding-bottom:50px;
    }
    .mrg_top{
        margin-top:20px;
    }
    .content_ele .row {
        gap:0px;
    }
    .center_img{
        margin-top:40px !important;
        margin-bottom:40px !important;
    }
    .empty-ele{
        height: 304px;
    width: 304px;
    }
    .animate_anchor{
            font-size: 16px;
    padding: 11.5px 46.5px;
    }
    .animate_anchor:hover{
    padding: 11.5px 60.5px;

    }
    .title_sect{
        margin-top:-1px;
    }
    .newlatter_sec .flex_alignBox{
        border-radius:20px;
    }
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


    <section class="banner_bottom_section" style="background:linear-gradient(#fcdfc166, #ff9d509e), url('<?php echo $website_url;?>/assets/images/group-bg.svg');background-size:cover;background-repear:norepeat">

        <div class="bg_style_target" style="background:url('<?php echo $website_url;?>/assets/images/header_img_style.svg') ;background-size: cover;">
            <div class="container-fluid">
                <div class="text-center">
                    <h1 class="heading_title width_title">
                      आचार्य विद्यासागर गौ अस्पताल <br>एवं <br> भगवान श्री राम पक्षी अस्पताल
                    </h1>

                    <div class="text-center subttle_box">
                        <h4 class="font_24_here">
                            पुण्य  के  साथ साथ – जीव कमाओ
                        </h4>

                        <p class="description_data">ग्वालियर , झांसी  , ललितपुर , दतिया , गैसाबाद , बाजना, के  उपरांत   अब <b>झांसी  में</b> विशाल  पशु–पक्षी अस्पताल का  भव्य  निर्माण ( सभी  स्वतंत्र  पशु  पक्षियों का निशुल्क  उपचार )</p>

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
                        <source src="<?php echo $website_url;?>/assets/images/insta-video-2.mp4" type="video/mp4">

                    </video>
                </div>
                <div class="videos-items">
                    <video autoplay muted loop playsinline width="100%">
                        <source src="<?php echo $website_url;?>/assets/images/insta-video-3.mp4" type="video/mp4">

                    </video>
                </div>
                <div class="videos-items">
                    <video autoplay muted loop playsinline width="100%">
                        <source src="<?php echo $website_url;?>/assets/images/insta-video-4.mp4" type="video/mp4">

                    </video>
                </div>
            </div>
       </div>


       <div class="container-fluid">
            <div class="hero-seccton" style="background:#fff url('<?php echo $website_url;?>/assets/images/bg-dayabhawna.png') ;background-size: cover;"">
                <div class="row flex_alignBox mt-2  revese_colm">

               <div class="col lg-5 col-md-5 col-sm-6 col-12 col-xs-12">

                  <div class="animal_box">

                     <img src="<?php echo $website_url;?>/assets/images/home/animal.png" alt="DayaBhawnaFoundation-Animal" class="animal_img">

                  </div>

               </div>

               <div class="col-lg-7 col-md-7 col-sm-6 col-12 col-xs-12">

                  <div class="text-center newone_hero">

                     <h1 class="heading_title" >दया भावना फाउण्डेशन</h1>
                     <p class="description_data">
                        भारत के प्रत्येक राष्ट्रीय महामार्ग पर प्रति 150 से  200 किलोमीटर  पर 108 गौ अस्पताल निर्माण का लक्ष |
                     </p>

                     <h3 class="subtitle_headingg">अहिंसा महातीर्थ</h3>

                     <h6 class="pera_heading">"ईश्वर आप  को दया करते  हुए  देखना  चाहते  है"</h6>

                     <p class="description_data">परम  पूज्य मुनि श्री अविकल सागर जी के मंगल प्रेरणा से भारत के प्रत्येक राष्ट्रीय महामार्ग पर प्रति 150 से 200 किलोमीटर अंतराल पर गौ अस्पताल निर्माण का लक्ष्य। भगवान महावीर भगवान राम की शिक्षा से अहिंसा परमो धर्म  की परिभाषा  को सार्थक करते हुए भारत भूमि पर अनंत काल से विचरण करने वाले प्रत्येक पशु पक्षी को पूर्ण स्वस्थ होने पर्यंत उपचार मिले। इस मंगल भावना से मुनि श्री अविकल सागर जी की करुणा मय दृष्टि से जो अनंत जीवों को मृत्यु तुल्य पीड़ा से मुक्त कराएगा।</p>

                     <h4 class="font_24_here">
                        जय श्री महावीर, जय श्री राम
                     </h4>

                     <div>
                        <a href="<?php echo $website_url;?>/assets/images/daya-bhawna-foundation-jhanshi-hospital.pdf" class="link_primary"target="_blank">और जाने</a>
                      <a href="#" class="link_Channge" target="_blank">अस्पताल देखेे</a>

                     </div>

                  </div>

               </div>

            </div>
            </div>
       </div>

    </section>


    <!-- end birds discription  -->

    <section class="banner_bottom_section" style="background:#492C02;">

        <div class="bg_style_target" style="padding-bottom:0px;background:url('<?php echo $website_url;?>/assets/images/header_img_style.svg') ;background-size: cover;">
            <div class="container-fluid">
                <div class="text-center">
                    <h1 class="heading_title width_title color_change">
                       - मंगल आशीर्वाद एवं प्रेरणा -
                    </h1>


                    <div class="mangal-slider ">

                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 col-xs-12">
                                <div class="card-bnnoxx">
                                    <div class="mangal-box-img">
                                        <img src="<?php echo $website_url;?>/assets/images/vidha-sagar.png" alt="">
                                    </div>
                                    <h4 class="position_title">मंगल आशीर्वाद  </h4>
                                    <h4 class="real-name">आचार्य श्री विद्यासागर जी</h4>
                                </div>

                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 col-xs-12">
                                <div class="card-bnnoxx">
                                    <div class="mangal-box-img">
                                        <img src="<?php echo $website_url;?>/assets/images/samay-sagar.png" alt="">
                                    </div>

                                     <h4 class="position_title">मंगल आशीर्वाद  </h4>
                                    <h4 class="real-name">आचार्य श्री समयसागर जी</h4>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 col-xs-12">

                                <div class="card-bnnoxx">
                                    <div class="mangal-box-img">
                                        <img src="<?php echo $website_url;?>/assets/images/sudha-sagar.png" alt="">
                                    </div>
                                    <h4 class="position_title">मंगल आशीर्वाद  </h4>
                                    <h4 class="real-name">मुनि श्री सुधासागर जी</h4>
                                 </div>

                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 col-xs-12">

                                <div class="card-bnnoxx">
                                    <div class="mangal-box-img">
                                        <img src="<?php echo $website_url;?>/assets/images/sudha-sagar-2.png" alt="">
                                    </div>
                                     <h4 class="position_title">मंगल प्रेरणा </h4>
                                    <h4 class="real-name">अविचल सागर जी महाराज</h4>
                                </div>

                            </div>
                        </div>







                    </div>

                </div>
            </div>
        </div>




    </section>

    <div class="title_sect">
        <h1 class="notific_text heading_title">
            - आचार्य श्री विद्यासागर गौ उपचार अस्पताल -
        </h1>
    </div>



    <div>
        <img src="<?php echo $website_url;?>/assets/images/daya-bhawna-foudation-map.png" alt="map daya bhawna foundation" class="w-100">
    </div>

    <!-- our service section start -->


    <section class="service_panel"  style="background:linear-gradient(#703000eb, #703000eb), url(<?php echo $website_url;?>/assets/images/bg-panel-service.png)">
        <!-- <img src="<?php echo $website_url;?>/assets/images/bg-panel-service.png" alt="map daya bhawna foundation" class="w-100 background_laters" > -->

        <div class="container_box_serr">
            <div class="content_eleement_box">
                <div class="empty-ele">

                </div>
                <div class="content_ele">

                    <h1 class="heading_title width_title color_change">
                      - सेवाएं -
                    </h1>

                    <div class="container-fluid  mrg_top" >
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-4 col-xs-4">
                                        <a href="<?php echo $website_url;?>/hospital?SevayeID=MQ==">
                                            <div class="img_box_serc">
                                                <img src="<?php echo $website_url;?>/assets/images/service-img-1.png" alt="Daya bhawna service image">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-4 col-xs-4">
                                        <a href="<?php echo $website_url;?>/medicine-donation?SevayeID=OA==">
                                            <div class="img_box_serc">
                                                <img src="<?php echo $website_url;?>/assets/images/service-img-2.png" alt="Daya bhawna service image">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-4 col-xs-4">
                                        <div class="img_box_serc">
                                            <img src="<?php echo $website_url;?>/assets/images/service-img-3.png" alt="Daya bhawna service image" class="center_img">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-4 col-xs-4">
                                        <a href="https://maps.app.goo.gl/8ZDZs6iCfJGSbVry7">
                                        <div class="img_box_serc">
                                            <img src="<?php echo $website_url;?>/assets/images/service-img-4.png" alt="Daya bhawna service image">
                                        </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-4 col-xs-4">
                                        <a href="<?php echo $website_url;?>/annadanam?SevayeID=NQ==">
                                            <div class="img_box_serc">
                                                <img src="<?php echo $website_url;?>/assets/images/service-img-5.png" alt="Daya bhawna service image">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>


    <!-- our service section end -->




    <div class="style-differ">
        <!-- Bank more Details Start-->

    <?php include('include/bankdetails.php') ?>

    <!-- Bank more Details End -->



    <!-- newlatter start -->

    <?php include('include/donation.php') ?>

    <!-- newslatter End -->



    <!-- review start -->

    <?php include('include/testimonial.php') ?>

    <!-- review end -->
    </div>



    <!-- footer start -->

    <?php include('include/footer.php') ?>

    <!-- footer end -->



    <!-- script start-->

    <?php include('include/script.php') ?>

    <!-- script end-->

    <script>
        $('.jashi-videos').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: false,
  autoplay: true,
  autoplayTimeout: 10000, // autoplay every 10 seconds
  autoplaySpeed: 1000, // smooth transition speed (optional)
  items: 4,
  navText: [
    '<span class="fa fa-chevron-left"></span>',
    '<span class="fa fa-chevron-right"></span>'
  ],
  responsive: {
    0: {
      items: 2
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