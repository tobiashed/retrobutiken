<?php 
    define("PAGE_TITLE", "Se beställningar");
    include "header.php";
    
?>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php#page-top">Webshop</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Meny
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php#portfolio">Produkter</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php#about">Om oss</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php#contact">Kontakt</a>
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
        <h2 class="text-center text-uppercase text-secondary mb-0">Beställningar</h2>
        <hr class="star-dark mb-5">
        <?php
// Funktion för validering av formuläret
function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php 
            // Databasuppkoppling
            require_once('connect.php');
            // Skapa SQL-sats som hämtar data från tabellerna produkt och beställning i databasen
            // tabellerna kopplas ihop genom artikelnr
            $query = "SELECT B.ordernr, B.orderdatum, P.artikelnr, P.namn, P.pris, B.fornamn, B.efternamn, B.telefon,
            B.epost, B.adress, B.postnr, B.stad
            FROM bestallning B, produkt P
            WHERE B.produkt = P.artikelnr
            ORDER BY B.ordernr";
            // Kör SQL-satsen
            $table = mysqli_query($connection,$query) or die(mysqli_error($connection));

        ?>
        <h3>Beställningar</h3>
        <!-- Visa en tabell över samtliga beställningar -->
        <table class='table table-sm table-hover' border='1'><tr>
            <thead class="thead-light">
                <th>Ordernr</th><th>Orderdatum</th><th>Art nr</th><th>Produkt</th>
                <th>Pris</th><th>Förnamn</th><th>Efternamn</th><th>Telefon</th>
                <th>E-post</th><th>Adress</th><th>Postnr</th><th>Stad</th>
                </tr>
                <?php while($row = $table->fetch_assoc()): // kolon : och endwhile; istället för klamrar {} ?>
                <tr>
            </thead>
            <td><?php echo $row['ordernr'] ?> </td>
            <td><?php echo $row['orderdatum'] ?> </td>
            <td><?php echo $row['artikelnr'] ?> </td>
            <td><?php echo $row['namn'] ?> </td>
            <td><?php echo $row['pris'] ?> </td>
            <td><?php echo $row['fornamn'] ?> </td>
            <td><?php echo $row['efternamn'] ?> </td>
            <td><?php echo $row['telefon'] ?> </td>
            <td><?php echo $row['epost'] ?> </td>
            <td><?php echo $row['adress'] ?> </td>
            <td><?php echo $row['postnr'] ?> </td>
            <td><?php echo $row['stad'] ?> </td>
            
            </tr>
                <?php endwhile; ?>
        </table>
        
        
    </section>

    
   

    <?php include "footer.php" ?>