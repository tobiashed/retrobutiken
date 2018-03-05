<?php 
    define("PAGE_TITLE", "Retrobutiken");
    define("BANNER_TITLE", "Välkommen till Retrobutiken!");
    include "header.php";
?>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Retrobutiken</a>
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
        <img class="img-fluid mb-5 d-block mx-auto rounded-circle" src="Bilder/firstPage.jpg" alt="">
        <h1 class="text-uppercase mb-0"><?=BANNER_TITLE?></h1>
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
    </section> <!-- Avslutar portfolio-segmentet -->

    <!-- About Section -->
<section class="bg-primary text-white mb-0" id="about">
  <div class="container">
    <h2 class="text-center text-uppercase text-white">Om Retrobutiken</h2>
    <hr class="star-light mb-5">
    <div class="row">
      <div class="col-lg-4 ml-auto">
        <p class="lead">Retrobutiken grundades 2018 av tre passionerade entusiaster med stor smak för äldre saker. 
        </p>
      </div> <!-- en kolumn slut -->
      <div class="col-lg-4 mr-auto">
            <p class="lead">Fast egentligen är det slutuppgiften i backend-kursen för KVALIT17 under vårterminen 2018. 
            <br>...eller så har vi stor smak för äldre saker, vem vet?</p>
      </div> <!-- en kolumn slut -->
    </div> <!-- row slut -->
  </div> <!-- containern slut -->   

  <!-- Starta raden med kort-kolumnerna -->
  <div class="row cardRow">

  <!-- Starta en kolumn: Tobias-->
  <div class="col-sm-4">
    <div class="card w-100">
      <img class="card-img-top img-fluid cardImg" src="Bilder/tobias.jpg" alt="Tobias Hedkvist">
      <div class="card-body">
         <p class="card-title cardName">Tobias Hedkvist </p>
        <p class="card-text"></p>
        <p>Mailadress: <br> <a href="">tobias.hedkvist@yh.nackademin.se</a></p>
      </div> <!-- card body -->
    </div> <!-- card -->
  </div> <!-- col -->

  <!-- Starta en kolumn: Susanne -->
  <div class="col-sm-4">
    <div class="card">
      <img class="card-img-top img-fluid cardImg" src="Bilder/susanne.jpg" alt="">
      <div class="card-body">
         <p class="card-title cardName">Susanne Fridh </p>
        <p class="card-text"></p>
        <p>Mailadress: <br> <a href="">susanne.fridh@yh.nackademin.se</a></p>
      </div> <!-- card body -->
    </div> <!-- card -->
  </div> <!-- col -->

  <!-- Starta en kolumn: Anna-Maja  -->
  <div class="col-sm-4">
    <div class="card">
      <img class="card-img-top img-fluid cardImg" src="Bilder/annamaja.jpg" alt="">
      <div class="card-body">
           <p class="card-title cardName">Anna-Maja Lithner </p>
          <p class="card-text"></p>
          <p>Mailadress: <br> <a href="">anna-maja.lithner@yh.nackademin.se</a></p>
      </div> <!-- card body -->
    </div> <!-- card -->
  </div> <!-- col -->

  <!-- avslutar raden -->
  </div>
</section>
    <!-- Contact Section -->
    <section id="contact">
      <div class="container" id="kontakt">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="text-center text-uppercase">Vill du veta mer</h2><br>
          <h2 class="text-center text-uppercase">eller bli återförsäljare?</h2> 
          <hr class="star-dark mb-5">
          <p> Fyll i dina kontaktuppgifter nedan, så hör vi av oss. <br>
            Vi ser fram emot att höra hur vi kan samarbeta! 
          </p>
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="sentMessage" id="contactForm" novalidate="novalidate">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Namn</label>
                  <input class="form-control" id="name" type="text" placeholder="Namn" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>E-post</label>
                  <input class="form-control" id="email" type="email" placeholder="E-post" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Telefonnummer</label>
                  <input class="form-control" id="phone" type="tel" placeholder="Telefonnummer" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Meddelande</label>
                  <textarea class="form-control" id="message" rows="5" placeholder="Meddelande" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton"><i class='fa fa-send-o'></i> Skicka</button>
              </div>
            </form>
          </div>
        </div>
        <div class="text-center mt-4">
          <a class="btn btn-primary btn-xl" href="products/api/index.php">
            <i class="fa fa-download mr-2"></i>
            Använd vår API
          </a>
        </div>
      </div>
    </section>

    <?php include "footer.php" ?>
