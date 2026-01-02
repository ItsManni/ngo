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
// Disable right-click
document.addEventListener('contextmenu', function(e) {
  e.preventDefault();
});

// Disable text selection & copying
document.addEventListener('selectstart', function(e) {
  e.preventDefault();
});
document.addEventListener('copy', function(e) {
  e.preventDefault();
});

// Disable common keyboard shortcuts (Ctrl+C, Ctrl+U, Ctrl+S, etc.)
document.addEventListener('keydown', function(e) {
  if (e.ctrlKey && (
      e.key === 'u' ||  // View source
      e.key === 's' ||  // Save
      e.key === 'c' ||  // Copy
      e.key === 'x' ||  // Cut
      e.key === 'p' ||  // Print
      e.key === 'i' ||  // Dev tools (Ctrl+Shift+I)
      e.key === 'j'     // Dev tools (Ctrl+Shift+J)
  )) {
    e.preventDefault();
    return false;
  }

  // Disable F12
  if (e.key === 'F12') {
    e.preventDefault();
  }
});
</script>

<script>
document.addEventListener('dragstart', function(e) {
  e.preventDefault();
});
</script>

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