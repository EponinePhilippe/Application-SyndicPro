<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <?php
  include('includeLst/headLst.php');
  ?>
</head>

<body>

  <?php
  include('includeLst/headerLst.php');
  include('includeLst/navLst.php');
  $idCopropriete=$_GET['idCopropriete'];
  $lesLots=getLesLotsCopropriete($bdd,$idCopropriete);

  ?>

  <div class="jumbotron">
    <div class="container">
      <section class="col-sm-8">
      
        <h1>Liste des lots:</h1>
        <div class="row">


          <?php
          foreach ($lesLots as $unLot) {
            $localisation=$unLot['localisation'];
            $tantieme=$unLot['tantieme'];
          ?>
                    <article class="col-md-4">
              <div class="card" style="width: 18rem; height: 8rem">
                <div class="card-body">
                    <h5 class="card-text"><h5>
                    <p class="card-text"><?php echo "<b> Localisation : ".$localisation."<br> Tantième : ".$tantieme ."</b>"?></p>
                </div>
              </div>

              <br>
            </article>
          <?php } ?>
          </div>
        </div>
      </section>
    </div>
  </div>

  <?php include('includeLst/footerLst.php'); ?>

</body>

</html>