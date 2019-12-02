<?php 
include('header.php');
?>
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('./file/gcoen2.png')">
          <div class="carousel-caption d-none d-md-block" style="background-color:rgb(148,255,196,0.3);color:black;font-family: 'Lucida Sans';">
            <h1>Grievance Redressal Portal</h1>
            <p><h3>One Platform Where You Can lodge Your Grievance</h3></p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('./file/flow.png')">
          <div class="carousel-caption d-none d-md-block" style="color:rgb(0, 0, 0);font-family: 'Lucida Sans';">
            <h6>Redressal Mechanism</h6>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('./file/gcoen2.png')">
          <div class="carousel-caption d-none d-md-block" style="background-color:rgb(148,255,196,0.3);color:rgb(0, 0, 0);font-family: 'Lucida Sans';">
            <p><h3>Grievance Against Bad Service or Unfair Treatment</h3></p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <br><br><br><br><br><br><br>
  <div class="jumbotron py-2 " style="background-color: black;color:lavenderblush;">
<p class="m-0 text-center text-white">  &copy;2019 ALL RIGHTS RESERVED.<br>DEVELOPED BY PRAJWAL PATIL. FOLLOW ON  </p>
 <center>
     <div style="align-content: center;"> 
     <a href="https://github.com/prajwal-scorpionking123"><i class="fa fa-github" style="padding-right:5px;font-size:50px;color:#3b5999;text-shadow:2px 2px 4px #000000;"></i></a>
     <a href="https://www.linkedin.com/in/prajwal-patil-609a19146/"><i class="fa fa-linkedin-square" style="padding-right:5px;color:#0077B5;font-size:50px;text-shadow:2px 2px 4px #000000;"></i></a>
     <!-- <a href="#"><i style="padding-right:5px;font-size:50px;color:#e4405f;text-shadow:2px 2px 4px #000000;" class="fa fa-instagram"></i></a> -->
    </div>
</center>
    </div>
  <?php 
  include('footer.php');
  ?>