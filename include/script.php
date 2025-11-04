<!-- bootstrap -->
<script src="<?php echo $website_url;?>/assets/script/bootstrape/bootstrap.bundle.min.js"></script>
<!-- Jquery CND -->
<script src="<?php echo $website_url;?>/assets/script/jQuery/jquery-3.6.0.min.js"></script>
<!-- Jquery UI JS -->
<script src="<?php echo $website_url;?>/assets/script/jQuery/jquery-ui.js"></script>
<!-- jquery owl-carousel -->
<script src="<?php echo $website_url;?>/assets/script/owl-carousel/owl.carousel.min.js"></script>
<!-- External Javascript -->
<script src="<?php echo $website_url;?>/assets/script/common.js"></script>

<script>
    function Alert(message) {
    alertify.alert("Daya Bhawna Foundation", message).set({
        transition: "fade"
    });
}

function openCity(evt, tabname) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabname).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>