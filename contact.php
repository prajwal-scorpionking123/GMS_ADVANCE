<?php 
include('header.php');
?>
  <!-- Page Content -->
  <div class="container">
    <br>
  <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Contact</li>
    </ol>
  <br>
    <!-- Content Row -->
    <div class="row">
      <!-- Map Column -->
      <div class="col-lg-8 mb-4">
        <!-- Embedded Google Map -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1861.7574913132362!2d79.06037387053452!3d21.052084210879716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1575197747166!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></div>
      <!-- Contact Details Column -->
      <div class="col-lg-4 mb-4">
        <h5>About GCOEN</h5>
        <p>Government College of Engineering, Nagpur is a newly formed Government College of Engineering in the state of Maharashtra starting from academic year 2016-17. College comes under the Rashtrasant Tukadoji Maharaj Nagpur University, Nagpur. College has big campus in Khapri area of Nagpur city.</p>
        <h5>Address</h5>
        <p>
            Government College of Engineering, Nagpur (GCOEN)
            Sector 27, Mihan Rehabilition Colony,
            Khapri (Railway) .
            Nagpur, Maharashtra, INDIA 441108
        </p>
        <p>
         <h5><i class="fa fa-phone"></i> Contact No.: 07103-202012</h5>
        </p>
        <p>
          
         <h5><i class="fa fa-envelope" aria-hidden="true"></i>Email:</h5>
          <a href="mailto:principal.gcoenagpur@dtemaharashtra.gov.in"><h6>principal.gcoenagpur@dtemaharashtra.gov.in</h6>
          </a>
        </p>
        
      </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
      <div class="col-lg-8 mb-4">
        <h3>Send us a Message</h3>
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="control-group form-group">
            <div class="controls">
              <label>Full Name:</label>
              <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Phone Number:</label>
              <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Message:</label>
              <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
            </div>
          </div>
          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
        </form>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?php 
include('footer.php');
?>