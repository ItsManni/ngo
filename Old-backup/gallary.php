<!DOCTYPE html>

<html lang="en">



<head>



    <?php include('include/meta.php') ?>

    <?php

        require_once('./admin/include/autoloader.inc.php');
        $dbh=new Dbh();
        $conn=$dbh->_connectodb();
        $core =new Core($conn);
        $gallery_obj=new Gallery($conn);
        $AllGallery=$gallery_obj->GetAllGalleryNew();
        $AllVideo=$gallery_obj->GetAllVideoNew();

        ?>

    <title>Gallery</title>



    <?php include('include/link.php') ?>



    <style>

         .tabcontent {

            display: none;

        }



        #photos {

            display: block;

        }





        button.tablinks {

             font-size: 16px;

    font-weight: 600;

    padding: 8px 20px;

    border-radius: 32px;

    border: 1px solid #ff9d50;

    background: #fff;

    color: #000;

    text-transform: uppercase;

        }



        .tab {

            display: flex;

            justify-content: center;

            gap: 30px;

        }



        .tablinks.active {

               background: #ff9d50;

    color: #fff;

        }



        .gallry_page{

            width: 100%;

            margin-top:20px;

            border-radius:10px;

            box-shadow:0px 0px 10px -5px rgba(0,0,0,.5);

            height:300px;

            object-fit:cover;

        }



        .viesdf iframe{

            border-radius:10px;

            margin-top:20px;

        }



        @media(max-width:768px){

            .gallry_page{

                height:125px;

            }



        }

        </style>



</head>





<body>

    <!-- Hedaer start -->

    <?php include('include/header.php') ?>

    <!-- Header End -->



    <section class="bg_color_transparent">

        <div class="container-fluid">

            <h1 class="heading_title">Gallery</h1>





           <div>

                <div class="tab">

                    <button class="tablinks active" onclick="openCity(event, 'photos')">Photos</button>

                    <button class="tablinks" onclick="openCity(event, 'videos')">Videos</button>

                </div>



                <div id="photos" class="tabcontent mt-4">

                    <div>

                        <div class="row">

                         <?php foreach($AllGallery as $gallery){?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div>
                                <img src="<?php echo $website_url;?>/admin/uploads/<?php echo $gallery['GalleryImage'];?>" alt="DayaBhawnaFoundation-Gallary-1"
                                    class="gallary_img rounded">
                            </div>
                        </div>
                            <?php }?>

                            <!-- <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">

                                <div>

                                    <img src="<?php echo $website_url;?>/assets/images/home/gallar1.webp" alt="DayaBhawnaFoundation-Gallary-1" class="gallry_page">

                                </div>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">

                                <div>

                                    <img src="<?php echo $website_url;?>/assets/images/home/gallar2.webp" alt="DayaBhawnaFoundation-Gallary-1" class="gallry_page">

                                </div>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">

                                <div>

                                    <img src="<?php echo $website_url;?>/assets/images/home/gallar3.webp" alt="DayaBhawnaFoundation-Gallary-1" class="gallry_page">

                                </div>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">

                                <div>

                                    <img src="<?php echo $website_url;?>/assets/images/home/gallar1.webp" alt="DayaBhawnaFoundation-Gallary-1" class="gallry_page">

                                </div>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">

                                <div>

                                    <img src="<?php echo $website_url;?>/assets/images/home/gallar2.webp" alt="DayaBhawnaFoundation-Gallary-1" class="gallry_page">

                                </div>

                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-6 col-6 col-xs-6">

                                <div>

                                    <img src="<?php echo $website_url;?>/assets/images/home/gallar3.webp" alt="DayaBhawnaFoundation-Gallary-1" class="gallry_page">

                                </div>

                            </div> -->

                        </div>

                    </div>

                </div>



                <div id="videos" class="tabcontent viesdf">

                    <div class="row">

                     <?php foreach($AllVideo as $Video){?>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 col-xs-12">
                            <iframe width="100%" height="236px"
                                src="https://www.youtube.com/embed/<?php echo $Video['VideoCode'];?>"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                            <?php }?>

                            <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-12 col-xs-12">

                              <iframe width="100%" height="236px" src="https://www.youtube.com/embed/cPHqxQLY9cE?si=yMDMlqGdpWz3aHfM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                           </div>

                           <div class="col-lg-4 col-md-4 col-sm-12 col-12 col-xs-12">

                              <iframe width="100%" height="236px" src="https://www.youtube.com/embed/ZpOlCz7UKX0?si=VznQJd_4OzyMaVVb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                           </div>

                           <div class="col-lg-4 col-md-4 col-sm-12 col-12 col-xs-12">

                              <iframe width="100%" height="236px" src="https://www.youtube.com/embed/VO22gFA7Zdg?si=RfNBmek-ck9hBPAb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                           </div>

                           <div class="col-lg-4 col-md-4 col-sm-12 col-12 col-xs-12">

                               <iframe width="100%" height="236px" src="https://www.youtube.com/embed/HSDKscNvEYE?si=nlhZoGJPJ7KIi6qC" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                           </div>

                           <div class="col-lg-4 col-md-4 col-sm-12 col-12 col-xs-12">

                               <iframe width="100%" height="236px" src="https://www.youtube.com/embed/lsLnjpFIx1I?si=fDqWV3Y5znmBBDRu" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                           </div> -->

                        </div>

                </div>



           </div>





        </div>

    </section>





    <!-- thank you end -->



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



</body>



</html>