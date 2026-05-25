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
//   $idCopropriete=$_GET['idCopropriete'];
//   if (!isset($_GET['idCopropriete'])) {
//     die("Paramètre idCopropriete manquant");
// }

$idCopropriete = (int)$_GET['idCopropriete'];
  $LesDevis=getLesDevis($bdd);
  $LesDevisCopro = getLesDevisCoproprietaire($bdd, $idCopropriete)

  ?>

  <div class="jumbotron">
    <div class="container">
      <section class="col-sm-8">
      
        <h1>Liste des devis:</h1>
        <div class="row">


          <?php
          foreach ($LesDevis as $unDevis) {
            $idDevis=$unDevis['idDevis'];
            $prestataire=$unDevis['prestataire'];    
            $dateDev=$unDevis['dateDev'];
            $MontantTTC=$unDevis['MontantTTC'];
            $vote=$unDevis['vote'];
            $idTravaux=$unDevis['idTravaux'];
          ?>
                    <article class="col-md-4">
              <div class="card" style="width: 18rem; height: 8rem;">
                <?php if($idTravaux == 10){?>
                <div class="card-body"style="background-color:#FFFF76;">
                    <h5 class="card-text"><h5>
                    <p class="card-text"><?php echo "Prestataire : ".$prestataire."<br>Date du Devis: ".$dateDev."<br>Montant TTC : ".$MontantTTC."<br>vote : ".$vote ."<b> </b>"?></p>
                    <?php }
                    
                    else if($idTravaux==20){?> <div class="card-body"style="background-color:#BF5C2B;">
                        <h5 class="card-text"><h5>
                        <p class="card-text"><?php echo "Prestataire : ".$prestataire."<br>Date du Devis: ".$dateDev."<br>Montant TTC : ".$MontantTTC."<br>vote : ".$vote ."<b> </b>"?></p> <?php } 
                    
                    else{?> <div class="card-body"style="background-color:#64ABC4;">
                        <h5 class="card-text"><h5>
                        <p class="card-text"><?php echo "Prestataire : ".$prestataire."<br>Date du Devis: ".$dateDev."<br>Montant TTC : ".$MontantTTC."<br>vote : ".$vote ."<b> </b>"?></p> <?php } ?></div>
                    
                    </div>
                    

              <br>
            </article>
          <?php } ?>
          <div class="card" style="width: 10px; height: 25px;background-color:#FFFF76;margin-left:12px">
          </div>
          <p style="margin-left: 30px; margin-top:-25px"><b>Rénovation parking</b></p>
          <div class="card" style="width: 10px; height: 25px;background-color:#BF5C2B;margin-left:12px">
          </div>
          <p style="margin-left: 30px; margin-top:-25px"><b>Réfection toiture</b></p>
          <div class="card" style="width: 10px; height: 25px;background-color:#64ABC4;margin-left:12px">
          </div>
          <p style="margin-left: 30px; margin-top:-25px"><b>Ravalement façade</b></p>
        
        
      </section>
    </div>
  </div>

  <?php include('includeLst/footerLst.php'); ?>

</body>

</html>