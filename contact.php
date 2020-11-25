<?php
include_once 'includes/head.php';
include_once 'includes/header.php';
?>

<section id="contact-us">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center fadeInDown">Contact Us</h2>
            <p class="text-center fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget
                risus vitae massa <br> semper aliquam quis mattis quam.</p>
        </div>
    </div>
</section><
<section id="contact">
    <div class="container-wrapper">
        <div class="container contact-info">
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="contact-form">
                        <address class="col-sm-10">
                            <strong>Pet Care.</strong><br>
                            12345 NewYork, Street 125<br>
                            United States 94107<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>

                        <article class="hours-block col-sm-10">

                            <div><strong>Walk-in Hours</strong></div>
                            <br/>
                            <div class="pull-left">
                                <p><b>Monday &amp; Tuesday</b></p>
                                <p><b>Wednesday</b></p>
                                <p><b>Thursday</b></p>
                                <p><b>Friday</b></p>
                                <p><b>Saturday</b></p>
                            </div>

                            <div class="pull-right">
                                <p>7am-8pm</p>
                                <p>9am-8pm</p>
                                <p>7am-8pm</p>
                                <p>8am-8pm</p>
                                <p>9am-8pm</p>
                            </div>

                        </article>

                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    <div class="contact-form">
                        <!--NOTE: Update your email Id in "contact_me.php" file in order to receive emails from your contact form-->
                        <form name="sentMessage" id="contactForm">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                       placeholder="Full Name" id="name" required
                                       data-validation-required-message="Please enter your name"/>
                                <p class="help-block"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email"
                                       id="email" required/>
                            </div>
                            <div class="form-group">
                                <textarea rows="10" cols="100" class="form-control"
                                      placeholder="Message" id="message" required
                                      data-validation-required-message="Please enter your message" minlength="5"
                                      data-validation-minlength-message="Min 5 characters"
                                      maxlength="999" style="resize:none"></textarea>
                             </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div id="google-map" style="height:400px" data-latitude="40.7141667" data-longitude="-74.00638891"></div>
</section><!--/#bottom-->


<?php
include_once 'includes/footer.php';
include_once 'includes/footer_script.php';
?>


