@extends('frontend/layouts/app-user')

@section('main')
<section>
    <!-- BREADCRUMS SECTION START HERE -->
    <div class="breadcrumb_wrapper">
        <div class="container">
            <div class="breadcrumb_block">
                <h1>CONTACT <span>US</span></h1>
                <div class="trackPage">
                    <a href="index.html">HOME</a>
                    <span>Contact Us</span>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMS SECTION END HERE -->

    <!-- CONTACT US SECTION START HERE -->
    <div class="contact-us default-padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4 order-2 order-lg-1">
                    <div class="heading left contact-title">
                        <h2>Get In <span>Touch</span></h2>
                    </div>
                    <div class="our-contact-info">
                        <div class="our-deatils mb-5 d-flex align-items-center">
                            <div class="information-icon">
                                <img loading='lazy' src="assets/frontend/images/icons/calling.svg" alt="">
                            </div>
                            <div class="information-details">
                                <h6>CALL NOW</h6>
                                <p class="number"><a href="tel:+123-1234-123">123-1234-123</a></p>
                                <p class="number"><a href="tel:+003-1234-123">003-1234-123</a></p>
                            </div>
                        </div>
                        <div class="our-deatils mb-5 d-flex align-items-center">
                            <div class="information-icon">
                                <img loading='lazy' src="assets/frontend/images/icons/mail.svg" alt="">
                            </div>
                            <div class="information-details">
                                <h6>Email Us</h6>
                                <p class="number"><a href="mailto:fitness@yourdomain.com">fitness@yourdomain.com</a>
                                </p>
                                <p class="number"><a href="mailto:fc@yourdomain.com">fc@yourdomain.com</a></p>
                            </div>
                        </div>
                        <div class="our-deatils d-flex align-items-center">
                            <div class="information-icon">
                                <img loading='lazy' src="assets/frontend/images/icons/location.svg" alt="">
                            </div>
                            <div class="information-details">
                                <h6>Our Location</h6>
                                <p class="address">1011Santa Monica boulevard <br>
                                    Los Angeles</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 order-1 order-lg-2">
                    <div class="appointment-form">
                        <div class="heading left appointment-title">
                            <h2>Get <span>Appointment</span></h2>
                        </div>
                        <form method="POST" class="form input-disabled-form">
                            <div class="form-row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="firstname" class="user-input" placeholder="Name*"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" name="phone" class="user-input"
                                                placeholder="Phone No.*" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <input type="email" name="email" class="user-input" placeholder="Email*"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="form-group">
                                            <textarea type="text" name="message" class="user-input"
                                                placeholder="Message*" spellcheck="false" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn send-btn" type="submit">
                                <span>Send Message</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTACT US SECTION END HERE -->

    <!-- GOOGLE MAP SECTION START HERE -->
    <div class="google-map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119066.41264385462!2d72.75225630862496!3d21.15934583206193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e59411d1563%3A0xfe4558290938b042!2sSurat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1657014622552!5m2!1sen!2sin"
            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- GOOGLE MAP SECTION END HERE -->

</section>
@endsection