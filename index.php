<?php 
    define("PAGE_TITLE", "Retrobutiken");
    include "header.php";
?>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Webshop</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Meny
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Produkter</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Om oss</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Kontakt</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="img/profile.png" alt="">
        <h1 class="text-uppercase mb-0">Välkommen till vår webshop!</h1>
        <hr class="star-light">
        <h2 class="font-weight-light mb-0">Antikt - Vintage - Retro</h2>
      </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Produkter</h2>
        <hr class="star-dark mb-5">
        <div class="row">
        
        <?php 
          // Databasuppkoppling
          require_once('connect.php');

          // Skapa SQL-sats som hämtar all data från tabellen produkt i databasen
          $query = "SELECT * FROM produkt";

          // Kör SQL-satsen
          $table = mysqli_query($connection,$query) or die(mysqli_error($connection));

          // Starta en loop för att skriva ut alla produkter som kort
          while($row = $table->fetch_assoc()){
        ?>

      <!-- Starta en kolumn -->
        <div class="col-md-6 col-lg-4">
          <a class="portfolio-item d-block mx-auto" href="#portfolio-modal-<?php echo $row['artikelnr'] ;?>">
          <div class="thumbnail">
            <div class="portfolio-item-caption d-flex position-absolute h-100 w-100">
              <div class="portfolio-item-caption-content my-auto w-100 text-center text-white">
                
                <i class="fa fa-search-plus fa-3x"></i>
                
              </div>
            </div>
              <img class="img-fluid" src="Bilder/<?php echo $row['bild'] ;?>" alt="<?php echo $row['namn'] ;?>">
              <div class="caption">
                <p><?php echo $row['namn'] ;?></p>
              </div>
            </a>
        </div>
        </div>
        <div class="portfolio-modal mfp-hide" id="portfolio-modal-<?php echo $row['artikelnr'] ;?>">
      <div class="portfolio-modal-dialog bg-white">
        <a class="close-button d-none d-md-block portfolio-modal-dismiss" href="#">
          <i class="fa fa-3x fa-times"></i>
        </a>
        <div class="container text-center">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h2 class="text-secondary text-uppercase mb-0"><?php echo $row['namn'] ;?></h2>
              <hr class="star-dark mb-5">
              <img class="img-fluid mb-5" src="Bilder/<?php echo $row['bild'] ;?>" alt="<?php echo $row['namn'] ;?>">
              <p class="mb-5">Pris: <?php echo $row['pris'] ;?> kr <br>Beskrivning: <?php echo $row['beskrivning'] ;?></p>
              <a class="btn btn-primary btn-lg rounded-pill " href="order.php?prodID=<?php echo $row['artikelnr'] ;?>#portfolio">
                <i class="fa fa-shopping-cart"></i>
                Köp nu!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
        
      <?php }; ?> <!-- Avsluta loop -->
          
      </div> 
    </section>

    <!-- About Section -->
    <section class="bg-primary text-white mb-0" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">Om oss</h2>
        <hr class="star-light mb-5">
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p class="lead">Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization.</p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p class="lead">Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
          </div>
        </div>
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light" href="products/api/index.php">
            <i class="fa fa-download mr-2"></i>
            Använd vår API
          </a>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Kontakta oss</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage" id="contactForm" novalidate="novalidate">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Name</label>
                  <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Email</label>
                  <input class="form-control" id="email" type="email" placeholder="Email" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Telefon</label>
                  <input class="form-control" id="phone" type="tel" placeholder="Telefon" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Message</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <?php include "footer.php" ?>
