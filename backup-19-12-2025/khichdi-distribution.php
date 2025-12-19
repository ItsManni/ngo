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
$AllSevayeProducts=$Product->GetAllProductBySevayeID($sevayeID);
$Sevaye_array=array();
foreach($AllSevaye as $sevaye)
{
 $Sevaye_array[$sevaye['ID']]=$sevaye['Name'];
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include('include/meta.php') ?>
      <title>अन्नदानम्</title>
      <?php include('include/link.php') ?>
   </head>
   <body>
      <!-- Hedaer start -->
      <?php include('include/header.php') ?>
      <!-- Header End -->
      <!-- banner start -->
      <div>
         <img src="<?php echo $website_url;?>/assets/images/home/website-banner-2.webp" alt="DayaBhawnaFoundation-Banner-2"
            class=" w-100">
      </div>
      <!-- banner end -->
      <!-- khichdi distribution start -->
      <section class="bg_color_transparent">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                  <div>
                     <h1 class="heading_title" style="text-align:left !important;margin-bottom:30px !important">अन्नदानम्</h1>
                     <h4 class="font_24_here">
                        निराश्रित, असहाय, मरीजों, अटेंडरो, एवं जरूरतमंदो को भोजन खिचड़ी वितरण
                     </h4>
                     <p class="description_data">
                        <b>"जहां भूख मिटती है, वहां इंसानियत खिलती है।"</b><br>
                        हर दिन न जाने कितने लोग केवल एक समय के भोजन के लिए संघर्ष कर रहे हैं — बच्चे, बुज़ुर्ग, अनाथ, झुग्गियों में रहने वाले परिवार और राहगीर।<br> <b>दया भावना फाउंडेशन</b> का उद्देश्य है कि <b>कोई भी व्यक्ति खाली पेट ना सोए।<br></b> हम प्रतिदिन ज़रूरतमंदों को <b>स्वस्थ, शुद्ध और पौष्टिक भोजन</b> उपलब्ध कराने की सेवा में लगे हैं — चाहे वह अस्पतालों के बाहर बैठे परिजन हों, सड़कों पर रहने वाले मजदूर, या अनाथ बच्चे।
                     </p>
                     <a href="<?php echo $website_url;?>/donation.php" class="web_button">डोनेट करें</a>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">
                  <div class="distribution_box">
                     <img src="<?php echo $website_url;?>/assets/images/khichdi.webp" alt="DayaBhawnaFoundation-Khichdi-Distribution" class="distribution_img">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- khichdi distribution End -->
      <!-- सेवा कहां होती है? start -->
      <section class="bg_color_secondary" style="padding-top:150px;">
         <div class="container-fluid">
            <div class="row flex_alignBox" style="justify-content:space-between">
               <div class="col-lg-3 col-md-3 col-sm-12 col-12 col-xs-12">
                  <div class="">
                     <h4 class="font_24_here">
                        सेवा कहां होती है?
                     </h4>
                     <p class="description_data">
                        Datia के विभिन्न क्षेत्रों में झुग्गी और असहाय बस्तियों में सरकारी अस्पतालों के बाहर प्रतीक्षारत परिजनों के लिए वृद्धाश्रमों और अनाथालयों में मासिक विशेष भोजन धार्मिक आयोजनों और पर्वों पर विशेष लंगर सेवा
                     </p>
                  </div>
               </div>
               <div class="col-lg-8 col-md-8 col-sm-12 col-12 col-xs-12">
                  <div class="row">
                        <?php foreach($AllSevayeProducts as $Product){ 
                            // Prepare token data
                            $tokenData = [
                                'donation_name' => $Product['Name'],
                                'amount'        => $Product['Ammount'],
                                'category_name' => $Sevaye_array[$Product['SevayeID']] ?? ''
                            ];
                            $token = base64_encode(json_encode($tokenData, JSON_UNESCAPED_UNICODE));
                            $donationLink = $website_url . "/donation.php?token=" . urlencode($token);
                        ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-6 col-xs-6">
                                <a href="<?php echo $donationLink; ?>" class="khichdi_box_pot" 
                                   style="display:block; text-decoration:none; color:inherit;">
                                    <div class="pot_box">
                                        <img src="<?php echo $website_url; ?>/admin/uploads/products/<?php echo $Product['Images']; ?>" 
                                             alt="<?php echo htmlspecialchars($Product['Name'], ENT_QUOTES, 'UTF-8'); ?>">
                                    </div>
                                    <div class="box_pot_rupee">
                                        <h5><?php echo $Product['Name']; ?></h5>
                                        <h4>₹ <?php echo number_format($Product['Ammount']); ?></h4>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>


                     <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-6 col-xs-6">
                        <div class="khichdi_box_pot">
                           <div class="pot_box">
                              <img src="<?php echo $website_url;?>/assets/images/khichdi-pot.webp" alt="">
                           </div>
                           <div class="box_pot_rupee">
                              <h5>1 दिन</h5>
                              <h4>₹ 1500</h4>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-6 col-6 col-xs-6">
                        <div class="khichdi_box_pot">
                           <div class="pot_box">
                              <img src="<?php echo $website_url;?>/assets/images/khichdi-pot.webp" alt="">
                           </div>
                           <div class="box_pot_rupee">
                              <h5>7 दिन</h5>
                              <h4>₹ 7000</h4>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-6 col-6 col-xs-6">
                        <div class="khichdi_box_pot">
                           <div class="pot_box">
                              <img src="<?php echo $website_url;?>/assets/images/khichdi-pot.webp" alt="">
                           </div>
                           <div class="box_pot_rupee">
                              <h5>15 दिन</h5>
                              <h4>₹ 15000</h4>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3 col-sm-6 col-6 col-xs-6">
                        <div class="khichdi_box_pot">
                           <div class="pot_box">
                              <img src="<?php echo $website_url;?>/assets/images/khichdi-pot.webp" alt="">
                           </div>
                           <div class="box_pot_rupee">
                              <h5>30 दिन</h5>
                              <h4>₹ 30000</h4>
                           </div>
                        </div>
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- सेवा कहां होती है? End -->
      <!-- youtube videos section start-->
      <!-- youtube videos section end -->
      <!-- other section start -->
      <section class="bg_color_transparent">
         <div class="container-fluid">
            <h4 class="font_24_here">
               हमारे प्रयास – आपकी प्रेरणा
            </h4>
            <p class="description_data">
               <b>भोजन वितरण, बच्चों की मुस्कान, बुज़ुर्गों की दुआएं)से करें योगदान?</b> 
            </p>
            <div class="flex_boxxx">
               <ul class="flex_boxxx_list">
                  <li class="description_data">
                     ₹1500 से दान शुरू करें 
                  </li>
                  <li class="description_data">मासिक या वार्षिक स्पॉन्सर बनें </li>
                  <li class="description_data">राशन, सब्ज़ियां, या भोजन सामग्री का दान करें </li>
                  <li class="description_data">सेवा में स्वयं शामिल होकर भोजन बांटें</li>
               </ul>
            </div>
         </div>
      </section>
      <!-- other section end -->
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
   </body>
</html>