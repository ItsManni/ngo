<?php
// Include database connection
require_once('admin/include/autoloader.inc.php');
$dbh = new Dbh();
$conn = $dbh->_connectodb();
$core = new Core();

// Fetch approved testimonials
$where = "WHERE IsActive = 1 AND ApprovalStatus = 'Approved' ORDER BY ID DESC";
$testimonials = $core->_getTableRecords($conn, "testimonial", $where);
?>

<section class="primary_backgrond">
        <div class="container-fluid">

            <h1 class="heading_title" style="color:#fff !important">टेस्टीमोनियल</h1>

            <div class="testimoanil_owl owl-carousel">
                <?php if(!empty($testimonials)): ?>
                    <?php foreach($testimonials as $testimonial): ?>
                        <div class="review_box">
                            <div class="review_content">
                                <div class="user_pic_box">
                                    <?php if(!empty($testimonial['UserImage'])): ?>
                                        <img src="<?php echo $website_url;?>/admin/project-assets/admin-media/testimonial/<?php echo $testimonial['UserImage']; ?>" style="width:100%;" class="user_pic">
                                    <?php else: ?>
                                        <img src="<?php echo $website_url;?>/assets/images/user_head.jpg" style="width:100%;" class="user_pic">
                                    <?php endif; ?>
                                </div>
                                <h3 class="user_name">
                                    <?php echo htmlspecialchars($testimonial['Name']); ?>
                                </h3>
                                <p class="user_cmt">
                                    <?php echo htmlspecialchars($testimonial['Description']); ?>
                                </p>
                                <?php if(!empty($testimonial['StarRating'])): ?>
                                    <div class="star-rating">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <?php if($i <= $testimonial['StarRating']): ?>
                                                <span class="star filled">★</span>
                                            <?php else: ?>
                                                <span class="star">☆</span>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="review_box">
                        <div class="review_content">
                            <div class="user_pic_box">
                                <img src="<?php echo $website_url;?>/assets/images/user_head.jpg" style="width:100%;" class="user_pic">
                            </div>
                            <h3 class="user_name">
                                No testimonials available
                            </h3>
                            <p class="user_cmt">
                                We are working on getting testimonials from our satisfied customers.
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section>