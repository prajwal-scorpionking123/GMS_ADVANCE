<?php 
include('header.php');
?>
<main role="main">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="first-slide" src="./file/gcoen1.png" width="100%" alt="First slide">
      <div class="container">
        <div class="carousel-caption text-center" style="background: rgba(50, 168, 162, 0.3);">
          <h1>Grievance Redressal Portal</h1>
          <p>One Platform Where You Can Logde Your Grievance </p>
          <p><a class="btn btn-lg btn-primary" href="login.php" role="button">Lodge Grievance</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="second-slide" src="./file/gcoen2.png" width="100%" alt="Second slide">
      <div class="container" >
        <div class="carousel-caption" style="background: rgba(50, 168, 162, 0.1);">
          
          <p><h1>Grievance Against the Unfair treatment or Bad Services</h1></p>
          <p><a class="btn btn-lg btn-primary" href="./track.php" role="button">Learn more</a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img class="third-slide" src="./file/flow.png" width="100%" alt="Third slide">
      <div class="container">
        <div class="carousel-caption">
        
          <p></p>
          <p><a class="btn btn-lg btn-primary" href="./guideline.php" role="button">Guidelines</a></p>
        </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</main>

  <?php 
  include('footer.php');
  ?>