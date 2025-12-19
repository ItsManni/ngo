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
$AllSevayeProducts=$Product->GetAllProductBySevayeIDNotSubcat($sevayeID);
$Sevaye_array=array();
foreach($AllSevaye as $sevaye)
{
 $Sevaye_array[$sevaye['ID']]=$sevaye['Name'];
}

$pageUrl = pathinfo(basename($_SERVER['PHP_SELF']), PATHINFO_FILENAME);
$AllSubSevaye = $IMSSetting->GetSubcategoriesByPageUrl($pageUrl);

$SubcategoryProducts = []; // map subcategory_id => products

foreach ($AllSubSevaye as $sub) {
    $SubcategoryProducts[$sub['ID']] = $Product->GetAllProductBySubcategoryID($sub['ID']);
}

?>

<!DOCTYPE html>

<html lang="en">



<head>



    <?php include('include/meta.php') ?>



    <title>औषधि दान</title>



    <?php include('include/link.php') ?>



</head>





<body>

    <!-- Hedaer start -->

    <?php include('include/header.php') ?>

    <!-- Header End -->



    <!-- banner start -->



    <div>

        <img src="<?php echo $website_url;?>/assets/images/home/website-banner-4.webp" alt="DayaBhawnaFoundation-Banner-2"class=" w-100">

    </div>

    <!-- banner end -->



    <!-- hunan Service start -->



    <section class="bg_color_transparent">

        <div class="container-fluid" >

            <div class="row flex_alignBox ">

                <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">

                    <div>

                        <h1 class="heading_title" style="text-align:left !important;margin-bottom:30px !important">औषधि दान</h1>

                        <h4 class="font_24_here">

                           असहाय गौवंश के लिए नियमित रूप से चिकित्सा

                        </h4>



                        <p class="description_data">

                            <b>"एक गोली, एक जीवन – इंसान या जानवर, हर जीवन की कीमत होती है"</b> <br>



                         आज भी भारत के कई गांवों और कस्बों में लाखों गायों, कुत्तों, पक्षियों और अन्य बेज़ुबानों को ज़रूरी दवाएं नहीं मिल पातीं। घाव, संक्रमण, दर्द या अंदरूनी बीमारियों से वे तड़पते हैं — क्योंकि इलाज उपलब्ध नहीं होता। दया भावना फाउंडेशन का उद्देश्य है कि हर बीमार या घायल पशु-पक्षी को समय पर उचित दवा और देखभाल मिले।

                           </p>

                        <a href="<?php echo $website_url;?>/donation.php" class="web_button">डोनेट करें</a>

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">



                    <div class="medicine_donation">

                        <img src="<?php echo $website_url;?>/assets/images/medicineDonation.webp" alt="DayaBhawnaFoundation-Medicine-Donation" class="medicine_donation_img">

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

                हमारा प्रयास

            </h4>

            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">

                    <div>

                        <p class="description_data">

                            हम Datia (मध्यप्रदेश) और आसपास के ग्रामीण क्षेत्रों में निःशुल्क पशु चिकित्सा सहायता और दवाइयों की आपूर्ति का कार्य कर रहे हैं।

                        </p>



                        <p class="description_data">

                            <b>गायों के लिए:</b>

                        </p>



                        <p class="description_data">

                            दर्द निवारक, एंटीबायोटिक व आयुर्वेदिक औषधियाँ <br>हड्डी टूटने, अपच, या संक्रमण में उपयोगी टॉनिक <br>गर्भवती व नवजात गायों के लिए पोषक दवाएं <br> सड़क दुर्घटना में घायल गायों हेतु इमरजेंसी ट्रीटमेंट किट

                        </p>



                        <p class="description_data">

                            <b>पक्षियों के लिए:</b>

                        </p>



                        <p class="description_data">

                            होम्योपैथिक दवाएं व आयुर्वेदिक उपचार <br> घायल पंख, संक्रमण या कमजोरी में राहत पहुंचाने वाली दवाएं <br> गर्मी व सर्दी में शरीर को संतुलित रखने वाले पोषक तत्व

                        </p>



                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-xs-12">



                    <div>

                        <h4 class="font_24_here">

                           दवाइयां कहां उपयोग होती हैं?

                        </h4>

                        <p class="description_data">

                        Acharya Vidyasagar Gaumata Upchaar Hospital  <br>

                        Bhagwan Shri Ram Pakshi Hospital <br>

                        गांवों में संचालित मोबाइल उपचार केंद्र <br>

                        आपात स्थिति में स्थानीय रेस्क्यू ऑपरेशन्स



                         </p>



                        <h4 class="font_24_here">

                           क्यों करें दवाओं में योगदान?

                        </h4>

                        <p class="description_data">



                          बेज़ुबानों की पीड़ा दूर करना सबसे महान सेवा है <br> आप जो दान करते हैं, वह सीधे इलाज में लगाया जाता है <br> 100% पारदर्शिता: दवा वितरण की पूरी जानकारी साझा की जाती है <br> आपका नाम स्टॉक रजिस्टर में दर्ज किया जाता है (निर्धारित राशि अनुसार)

                        </p>

                    </div>

                </div>

            </div>



        </div>

    </section>



    <!-- other section end -->



    <!-- अपना दान चुने start -->



    <section class="bg_color_transparent pb-0">

        <div class="container-fluid">

            <div class="text-center">

                <h1 class="heading_title">

                    अपना दान चुने

                </h1>

                <h4 class="section_sb_heading">

                    उनकी आवाज़ नहीं है, पर उनकी पीड़ा असली है — आइए उन्हें राहत दें, दवा दें, जीवन दें।"

                </h4>

            </div>

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
            </div>

            <!--<div class="row mt-5">-->



            <!--    <div class="col-lg-4 col-md-4 col-6 col-xs-6 col-sm-6">-->

            <!--        <div class="select_donate_box bg_color_secondary">-->

            <!--            <img src="<?php echo $website_url;?>/assets/images/samanay-davai.webp" alt="DayaBhawnaFoundation-bhusa-ghar" class="donate_type_img">-->

            <!--            <h1 class="donation_type">-->

            <!--               सामान्य दवाएँ-->

            <!--            </h1>-->



            <!--            <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>-->





            <!--        </div>-->

            <!--    </div>-->

            <!--    <div class="col-lg-4 col-md-4 col-6 col-xs-6 col-sm-6">-->

            <!--        <div class="select_donate_box bg_color_secondary">-->

            <!--            <img src="<?php echo $website_url;?>/assets/images/swasth-tonic.webp" alt="DayaBhawnaFoundation-bhusa-ghar" class="donate_type_img">-->

            <!--            <h1 class="donation_type">-->

            <!--               स्वास्थ्य टॉनिक-->

            <!--            </h1>-->



            <!--            <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>-->





            <!--        </div>-->

            <!--    </div>-->

            <!--    <div class="col-lg-4 col-md-4 col-6 col-xs-6 col-sm-6">-->

            <!--        <div class="select_donate_box bg_color_secondary">-->

            <!--            <img src="<?php echo $website_url;?>/assets/images/imp-tica.webp" alt="DayaBhawnaFoundation-important-tika" class="donate_type_img">-->

            <!--            <h1 class="donation_type">-->

            <!--                महत्वपूर्ण टीकाकरण-->

            <!--            </h1>-->



            <!--            <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>-->





            <!--        </div>-->

            <!--    </div>-->



            <!--    <div class="col-lg-4 col-md-4 col-6 col-xs-6 col-sm-6">-->

            <!--        <div class="select_donate_box bg_color_secondary">-->

            <!--            <img src="<?php echo $website_url;?>/assets/images/hospital/bhusa-ghar.webp" alt="DayaBhawnaFoundation-bhusa-ghar" class="donate_type_img">-->

            <!--            <h1 class="donation_type">-->

            <!--                चिकित्सा उपकरण 1-->

            <!--            </h1>-->



            <!--            <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>-->





            <!--        </div>-->

            <!--    </div>-->

            <!--    <div class="col-lg-4 col-md-4 col-6 col-xs-6 col-sm-6">-->

            <!--        <div class="select_donate_box bg_color_secondary">-->

            <!--            <img src="<?php echo $website_url;?>/assets/images/hospital/bhusa-ghar.webp" alt="DayaBhawnaFoundation-bhusa-ghar" class="donate_type_img">-->

            <!--            <h1 class="donation_type">-->

            <!--                चिकित्सा उपकरण 2-->

            <!--            </h1>-->



            <!--            <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>-->



            <!--                         </div>-->

            <!--    </div>-->

            <!--    <div class="col-lg-4 col-md-4 col-6 col-xs-6 col-sm-6">-->

            <!--        <div class="select_donate_box bg_color_secondary">-->

            <!--            <img src="<?php echo $website_url;?>/assets/images/hospital/bhusa-ghar.webp" alt="DayaBhawnaFoundation-bhusa-ghar" class="donate_type_img">-->

            <!--            <h1 class="donation_type">-->

            <!--                चिकित्सा उपकरण 3-->

            <!--            </h1>-->



            <!--            <a href="<?php echo $website_url;?>/donation.php" class="donatetoggle donate_button_style">डोनेट करें</a>-->





            <!--        </div>-->

            <!--    </div>-->

            <!--</div>-->

        </div>

    </section>



    <!-- अपना दान चुने End -->







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


</html>