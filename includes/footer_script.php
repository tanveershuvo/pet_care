<!-- password validation -->
<script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>
<script src="js/jquery.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/mousescroll.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script src="js/jquery.inview.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="contact/jqBootstrapValidation.js"></script>
<script src="contact/contact_me.js"></script>
<script src="js/contact.js"></script>
<script src="js/custom-scripts.js"></script>

</body>

</html>