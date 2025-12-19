<?php
require_once('./admin/include/autoloader.inc.php');
$dbh=new Dbh();
$conn=$dbh->_connectodb();
$core =new Core($conn);
$IMSSetting=new IMSSetting($conn);
$Product=new Product($conn);
$AllSevaye=$IMSSetting->AllSevaye();
$sevayeID='-1';
if(isset($_GET['SevayeID']))
{
   $sevayeID=$_GET['SevayeID'];
   $sevayeID=base64_decode($sevayeID);
}
// $AllSevayeProducts=$Product->GetAllProductBySevayeID($sevayeID);

$AllSevayeProducts=$Product->GetAllProductBySevayeIDNotSubcat($sevayeID);
$Sevaye_array=array();
foreach($AllSevaye as $sevaye)
{
 $Sevaye_array[$sevaye['ID']]=$sevaye['Name'];
}
$AllSubSevaye = $IMSSetting->AllSubSevaye(); // get all active subcategories
$SubcategoryProducts = []; // map subcategory_id => products

foreach ($AllSubSevaye as $sub) {
    $SubcategoryProducts[$sub['ID']] = $Product->GetAllProductBySubcategoryID($sub['ID']);
}

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include('include/meta.php') ?>
      <title>आचार्य विद्यासागर गौ अस्पताल</title>
      <?php include('include/link.php') ?>
   </head>
   <body>
      <!-- Hedaer start -->
      <?php include('include/header.php') ?>
      <!-- Header End -->
      <!-- hospital Banner start -->
      <section class="bg_color_transparent">
         <div class="container-fluid">
            <div class="text-center">
               <h1 class="section_heading">
                  जीणों देवो  जीणों देवो , जीणों देवो जीणो जीणो । दयाधम्मो  दयाधम्मो ,दयाधम्मो दया सदा
               </h1>
               <h4 class="section_sb_heading">
                  <!--Where cows are happy, prosperity is there. Where cows are in grief, adversity is there.-->
                  Live the Divine, forever shine, Compassion true, the law divine. Compassion ever, pure and bright,Eternal Dharma, guiding light.
               </h4>
            </div>
            <div class="row mt-5">
               <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-12">
                  <div>
                     <img src="./assets/images/hospital/hospital.webp" alt="DayaBhawnaFoundation-Hospital" class="w-100">
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-12 col-12 col-xs-12">
                  <div class="range_circle_box">
                     <div class="cmpy_detail">
                        <p class="content_cmpy">
                           Tax exempted under section 80G(5)(iii) of Income tax vide registration No AAGAS2376C22LK02
                        </p>
                        <p class="content_cmpy">Sankalp video for contribution above Rs 2000</p>
                     </div>
                     <div class="your_seva_box">
                        <div class="row flex_alignBox cmpy_detail">
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6">
                              <div class="circle-container">
                                 <svg width="160" height="160">
                                    <circle class="circle-bg" cx="80" cy="80" r="65" />
                                    <circle class="circle" cx="80" cy="80" r="65" />
                                 </svg>
                                 <div class="percentage">0%</div>
                                 <!-- <button class="btn">Animate</button> -->
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6 fix_colms">
                              <div class="box_model_track">
                                 <h2>
                                    May 2025
                                 </h2>
                                 <h4>
                                    Month
                                 </h4>
                              </div>
                              <div class="box_model_track">
                                 <h2>
                                    81 Lakh Kg
                                 </h2>
                                 <h4>
                                    Total Fodder Required
                                 </h4>
                              </div>
                           </div>
                        </div>
                        <a href="#dan_section_id" class="add_your_Seva">Add Your Seva</a>
                     </div>
                  </div>
                  <div class="payment_metho text-center">
                     <p class="content_cmpy">All Cards & Net banking Accepted</p>
                     <img src="./assets/images/hospital/payment_icon.png" alt="DayaBhawnaFoundation-Payment-Method" class="">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- hospital banner End -->
      <!-- Bank more Details Start-->
      <!-- Bank more Details End -->
      <!-- select Your seva start -->
      <section class="bg_color_secondary" id="dan_section_id">
         <div class="container-fluid">
            <h1 class="heading_title">अपना दान चुने</h1>
            <div class="row">

             <?php foreach($AllSubSevaye as $subcat): ?>
                      <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                          <div class="select_donate_box">
                              <img src="<?php echo $website_url;?>/admin/<?php echo $subcat['SubcategoryImage']; ?>"
                                   alt="<?php echo $subcat['SubcategoryName']; ?>"
                                   class="donate_type_img">
                              <h1 class="donation_type">
                                  <?php echo $subcat['SubcategoryName']; ?>
                              </h1>
                              <button class="donate_button_style"
                                      onclick="openSubcategoryProducts(<?php echo $subcat['ID']; ?>)">
                                  डोनेट करें
                              </button>
                          </div>
                      </div>
                  <?php endforeach; ?>
               <?php foreach($AllSevayeProducts as $Product){
                  $tokenData = [
                       'donation_name' => $Product['Name'],
                       'amount'        => $Product['Ammount'],
                       'category_name'   => $Sevaye_array[$Product['SevayeID']]
                   ];
                   $token = base64_encode(json_encode($tokenData, JSON_UNESCAPED_UNICODE));
                  ?>
                 <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/admin/uploads/products/<?php echo $Product['Images']?>" alt="<?php echo $Product['Name']?>" class="donate_type_img">
                     <h1 class="donation_type">
                        <?php echo $Product['Name']?>
                     </h1>
                      <a href="<?php echo $website_url; ?>/donation?token=<?php echo urlencode($token); ?>" class="donatetoggle donate_button_style"> डोनेट करें</a>
                  </div>
               </div>
               <?php } ?>




            <!-- --------------------static part need to remove letter-------------- -->
              <!--  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/parvesh-dwaar.webp" alt="DayaBhawnaFoundation-parvesh-dwaar" class="donate_type_img">
                     <h1 class="donation_type">
                        प्रवेश द्वार ₹3 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/mukhya-hospital.webp" alt="DayaBhawnaFoundation-mukhya-hospital" class="donate_type_img">
                     <h1 class="donation_type">
                        मुख्य अस्पताल भवन ₹11 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/operation-kaksh.webp" alt="DayaBhawnaFoundation-operation-kaksh" class="donate_type_img">
                     <h1 class="donation_type">
                        ऑपरेशन कक्ष ₹2.50 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/bhusa-ghar.webp" alt="DayaBhawnaFoundation-bhusa-ghar" class="donate_type_img">
                     <h1 class="donation_type">
                        भूसा घर ₹8 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/gau-vishraam-greh.webp" alt="DayaBhawnaFoundation-gau-vishraam-greh" class="donate_type_img">
                     <h1 class="donation_type">
                        गौ विश्राम गृह ₹8 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/staf-room.webp" alt="DayaBhawnaFoundation-staf-room" class="donate_type_img">
                     <h1 class="donation_type">
                        स्टाफ रुम (3) ₹6 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/ambulance.webp" alt="DayaBhawnaFoundation-ambulance" class="donate_type_img">
                     <h1 class="donation_type">
                        एम्बुलेन्स ₹14.50 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/aushdhi.webp" alt="DayaBhawnaFoundation-aushdhi" class="donate_type_img">
                     <h1 class="donation_type">
                        औषधि कक्ष ₹1 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/bike.webp" alt="DayaBhawnaFoundation-bike" class="donate_type_img">
                     <h1 class="donation_type">
                        बाइक ₹1 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/taar.webp" alt="DayaBhawnaFoundation-taar" class="donate_type_img">
                     <h1 class="donation_type">
                        तार फेंसिंग ₹5 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/jal-sangreh.webp" alt="DayaBhawnaFoundation-jal-sangreh" class="donate_type_img">
                     <h1 class="donation_type">
                        जल संग्रहण ₹1.5 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/kutti-machine.webp" alt="DayaBhawnaFoundation-kutti-machine" class="donate_type_img">
                     <h1 class="donation_type">
                        हरा चारा कुट्टी मशीन ₹50 हजार प्रति
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/cooler.webp" alt="DayaBhawnaFoundation-cooler" class="donate_type_img">
                     <h1 class="donation_type">
                        कूलर (3) ₹50 हजार प्रति
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/street-light.webp" alt="DayaBhawnaFoundation-street-light" class="donate_type_img">
                     <h1 class="donation_type">
                        लाइट ₹2.50 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/camera.webp" alt="DayaBhawnaFoundation-camera" class="donate_type_img">
                     <h1 class="donation_type">
                        कैमरा ₹1 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/jal-vyavastha.webp" alt="DayaBhawnaFoundation-jal-vyavastha" class="donate_type_img">
                     <h1 class="donation_type">
                        जल व्यवस्था ₹1.50 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/sign-board.webp" alt="DayaBhawnaFoundation-sign-board" class="donate_type_img">
                     <h1 class="donation_type">
                        साइन बोर्ड ₹1.50 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/tuladaan.webp" alt="DayaBhawnaFoundation-tuladaan" class="donate_type_img">
                     <h1 class="donation_type">
                        तुलादान ₹21 हजार
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/bird-hospital.webp" alt="DayaBhawnaFoundation-bird-hospital" class="donate_type_img">
                     <h1 class="donation_type">
                        पक्षी अस्पताल भवन ₹2.50 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/upchar-upkaran.webp" alt="DayaBhawnaFoundation-upchar-upkaran" class="donate_type_img">
                     <h1 class="donation_type">
                        उपचार उपकरण ₹1 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/cow-bed.webp" alt="DayaBhawnaFoundation-cow-bed" class="donate_type_img">
                     <h1 class="donation_type">
                        काऊ बेड 100 नग ₹4000 प्रति
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/fridge.webp" alt="DayaBhawnaFoundation-fridge" class="donate_type_img">
                     <h1 class="donation_type">
                        1 फ्रिज ₹80 हजार
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/stretcher.webp" alt="DayaBhawnaFoundation-stretcher" class="donate_type_img">
                     <h1 class="donation_type">
                        1 स्ट्रेचर ₹50 हजार
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/rasoi.webp" alt="DayaBhawnaFoundation-rasoi" class="donate_type_img">
                     <h1 class="donation_type">
                        1 पशु रसोई घर ₹3 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/almari.webp" alt="DayaBhawnaFoundation-almari" class="donate_type_img">
                     <h1 class="donation_type">
                        5 अलमारी ₹1.25 लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-6">
                  <div class="select_donate_box">
                     <img src="<?php echo $website_url;?>/assets/images/hospital/bhakti-sangeet.webp" alt="DayaBhawnaFoundation-bhakti-sangeet" class="donate_type_img">
                     <h1 class="donation_type">
                        भक्ति संगीत ₹1 सेट 1लाख
                     </h1>
                     <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>
                  </div>
               </div> -->


        <!-- ------------------------------- -->
            </div>
         </div>
      </section>
      <!-- select your seva end -->
      <!-- new section adding -->
      <section class="bg_color_transparent">
         <div class="container-fluid">
            <h4 class="font_24_here">
               भू दान
            </h4>
            <p class="description_data">
               <b>अस्पताल निर्माण हेतु  1 एकड़  भूमि  की आवश्यकता</b>
            </p>
            <div class="flex_boxxx">
               <ul class="flex_boxxx_list">
                  <li class="description_data">
                     भारत  का  कोई  भी व्यक्ति  ,किसी  भी स्थान पर अस्पताल निर्माण के  लिए  भूमि  दान  दे सकता  है  ।
                  </li>


                  <!-- <li class="description_data">मासिक या वार्षिक स्पॉन्सर बनें </li>
                     <li class="description_data">राशन, सब्ज़ियां, या भोजन सामग्री का दान करें </li>

                     <li class="description_data">सेवा में स्वयं शामिल होकर भोजन बांटें</li> -->
               </ul>
               <p class="description_data">विश्व वंदनीय.. महा तपस्वी ..युग श्रेष्ठ - आचार्य श्री 108 विद्यासागर महाराज जी के द्वारा 2004 में दिगंबर संन्यास प्राप्त कर मुनि श्री अविचल सागर जी ने कठोर व्रत, नियम, संयम, तप को धारण किया है। अध्यात्म की ऊंचाइयों को प्राप्त कर - 'जगत कल्याण- प्राणी कल्याण' की भावना से उनका हृदय भरा हुआ है।</p>

  <p class="description_data">गुरु शिक्षा, शास्त्र प्रमाण, प्रभु आज्ञा को प्राथमिकता देकर भारतीय संस्कृति, संस्कार, आध्यात्म की रक्षा तथा "अहिंसा परमो धर्म" और दया धर्म के मूल सिद्धांत को समझते हुए "दया भावना फाउंडेशन" की स्थापना की गई है। इसका उद्देश्य भारतवर्ष के प्रत्येक पशु-पक्षी को उपचार की सुविधा प्रदान करना है।</p>

  <h4 class="font_24_here">गौ उपचार एवं पक्षी उपचार अस्पताल की आवश्यकता</h4>

  <p class="description_data">मनुष्यों ने अपने स्वयं के उपचार के लिए पर्याप्त सुविधाएं बना ली हैं, परंतु मूक, अनाश्रित, दुर्घटनाग्रस्त पशुओं के लिए कोई अत्याधुनिक सुविधा उपलब्ध नहीं है। पशु-पक्षी भूख, प्यास, सर्दी, गर्मी की पीड़ा तो सहन करते ही हैं, परंतु उनके घावों पर मरहम लगाने वाला कोई नहीं।</p>

  <p class="description_data">हाईवे पर ट्रकों, डम्परों आदि से दुर्घटनाग्रस्त पशुओं को पैरों का कुचला जाना, हड्डी टूटना, घाव हो जाना जैसे दर्दनाक स्थितियों से गुजरना पड़ता है।</p>

  <p class="description_data">ऐसे में दया भावना फाउंडेशन, मुनि श्री 108 अविचल सागर महाराज जी की प्रेरणा से "आचार्य विद्यासागर गौ उपचार अस्पताल" एवं "श्रीराम पक्षी अस्पताल" का निर्माण करने जा रहा है।</p>

  <h4 class="font_24_here">क्या आप को पता है?</h4>

  <p class="description_data">भारत में लाखों-करोड़ों पशु-पक्षियों के लिए कोई सुव्यवस्थित उपचार केंद्र या अस्पताल नहीं है। इसके कारण वे पीड़ा, दर्द व तकलीफ में जीवन व्यतीत कर रहे हैं।</p>

  <p class="description_data">इसी आवश्यकता को देखते हुए मुनि श्री की प्रेरणा से "दया भावना फाउंडेशन" संचालित हो रहा है, जिसका उद्देश्य है:</p>

  <h4 class="font_24_here">फाउंडेशन का मुख्य लक्ष्य</h4>

  <p class="description_data">भारत के प्रत्येक गांव, नगर और शहर में प्रत्येक प्राणी को औषधि और उपचार की सुविधा मिल सके।</p>

  <p class="description_data">इस लक्ष्य को साकार करने हेतु फाउंडेशन ने संकल्प लिया है कि:</p>

  <ul>
    <li class="description_data">प्रत्येक फोर लेन हाईवे एवं जिले में अत्याधुनिक उपकरणों से युक्त पशु-पक्षी अस्पताल बनाए जाएं।</li>
    <li class="description_data">प्रत्येक 100 से 150 किलोमीटर की दूरी पर राष्ट्रीय और राज्य मार्गों पर अस्पताल बनें।</li>
    <li class="description_data">संपूर्ण भारत में 108 पशु-पक्षी अस्पतालों का निर्माण किया जाए।</li>
  </ul>

  <p class="description_data">यह संकल्प आप सभी के सहयोग के बिना पूर्ण नहीं हो सकता।</p>

  <h4 class="font_24_here">अस्पतालों की आवश्यकता</h4>

  <ul>
    <li class="description_data">भारत में कहीं भी पशु-पक्षी उपचार हेतु पर्याप्त संख्या में अस्पताल नहीं हैं।</li>
    <li class="description_data">दुर्घटनाग्रस्त पशुओं को लाने हेतु एंबुलेंस सुविधा नहीं है।</li>
    <li class="description_data">प्रशिक्षित डॉक्टरों और गौ-उपचारकों की भारी कमी है।</li>
    <li class="description_data">कोई ऐसा स्थान नहीं जहां घायल पशु को एडमिट करके पूर्ण रूप से उपचार दिया जा सके।</li>
    <li class="description_data">प्राकृतिक संसाधनों से भोजन तो मिल जाता है, परंतु औषधि नहीं।</li>
    <li class="description_data">पीड़ा, महामारी, अपघात या बीमारी की स्थिति में भी कोई उपचार की व्यवस्था नहीं है।</li>
  </ul>

  <h4 class="font_24_here">अस्पताल निर्माण से मिलने वाले लाभ</h4>

  <ul>
    <li class="description_data">हर अस्पताल के चारों ओर 100 किलोमीटर तक उपचार सुविधा उपलब्ध होगी।</li>
    <li class="description_data">हाइड्रोलिक एंबुलेंस से घायल पशु को उपचार हेतु लाना आसान होगा।</li>
    <li class="description_data">आधुनिक उपकरणों से उपचार एवं औषधि शीघ्र उपलब्ध होगी।</li>
    <li class="description_data">ऑपरेशन कक्ष में ऑपरेशन, पट्टी, प्लास्टर आदि की सुविधा होगी।</li>
    <li class="description_data">पक्षियों के लिए अलग उपचार कक्ष होगा।</li>
    <li class="description_data">प्रत्येक पशु-पक्षी को पूर्ण स्वस्थ होने तक एडमिट किया जा सकेगा।</li>
    <li class="description_data">स्वस्थ होने तक पौष्टिक भोजन, औषधि और सुरक्षा दी जाएगी।</li>
    <li class="description_data">राष्ट्रीय महामार्गों पर घूमने वाले पशुओं के लिए रेडियम बेल्ट लगाए जाएंगे।</li>
    <li class="description_data">उपचार के बाद पशु-पक्षियों को गौशालाओं में जीवन पर्यंत संरक्षित किया जाएगा।</li>
  </ul>

  <p class="description_data">इस महान कार्य में आप सभी की भागीदारी आवश्यक है। अधिक जानकारी के लिए फाउंडेशन की वेबसाइट पर जाएं।</p>
            </div>
         </div>
      </section>
      <!-- end new section -->
      <!-- newlatter start -->
      <?php include('include/donation.php') ?>
      <!-- newslatter End -->
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


<!-- Subcategory Products Modal -->
<div class="modal fade" id="subcatProductModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header  text-white" style="background-color: #ffa258;">
                <h5 class="modal-title" id="subcatProductModalLabel">दान चुने</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row" id="subcatProductList">
                    <!-- Product items will be loaded here dynamically -->
                </div>
            </div>
        </div>
    </div>
</div>


<script>
   // Subcategory Products mapping from PHP
let SubcategoryProducts = <?php echo json_encode($SubcategoryProducts, JSON_UNESCAPED_UNICODE); ?>;
let website_url = "<?php echo $website_url; ?>"; // global website URL

function openSubcategoryProducts(subcatID) {
    let products = SubcategoryProducts[subcatID] || [];
    let html = '';

    if (products.length === 0) {
        html = '<div class="col-12"><p>No products available in this subcategory.</p></div>';
    } else {
        products.forEach(product => {
            let tokenData = {
                donation_name: product.Name,
                amount: product.Ammount,
                category_name: product.SevayeSubcategoryID
            };
            let token = utf8_to_b64(JSON.stringify(tokenData)); // <-- fixed here
            html += `
                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                    <div class="select_donate_box">
                        <img src="${website_url}/admin/uploads/products/${product.Images}"
                             alt="${product.Name}" class="donate_type_img">
                        <h1 class="donation_type">${product.Name}</h1>
                        <a href="${website_url}/donation?token=${encodeURIComponent(token)}"
                           class="donatetoggle donate_button_style">डोनेट करें</a>
                    </div>
                </div>
            `;
        });

         html += `
            <div class="col-12 text-center mt-4">
                <a href="https://dayabhawnafoundation.com/donation"
                   target="_blank"
                   class="btn btn-warning text-white px-4 py-2 rounded-pill fw-bold shadow-sm">
                    स्वयं दान करें (Self Donation)
                </a>
            </div>
        `;
    }

    document.getElementById('subcatProductList').innerHTML = html;
    let subcatModal = new bootstrap.Modal(document.getElementById('subcatProductModal'));
    subcatModal.show();
}

function utf8_to_b64(str) {
    return window.btoa(unescape(encodeURIComponent(str)));
}


</script>