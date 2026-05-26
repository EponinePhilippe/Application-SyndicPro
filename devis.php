<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include('includeLst/headLst.php'); ?>
</head>

<body>

  <?php
  include('includeLst/headerLst.php');
  include('includeLst/navLst.php');

  $idCopropriete = (int)$_GET['idCopropriete'];
  $LesDevis = getLesDevisCoproprietaire($bdd, $idCopropriete);
  ?>

  <div class="jumbotron">
    <div class="container">
      <section class="col-sm-12"> <br>
        <h1>Liste des devis</h1>
        <br>
        
        <div class="row">
          <?php
          foreach ($LesDevis as $unDevis) {
            $idDevis     = $unDevis['idDevis'];
            $prestataire = $unDevis['prestataire'];    
            $dateDev     = $unDevis['dateDev'];
            $MontantTTC  = $unDevis['MontantTTC'];
            $vote        = $unDevis['vote'];
            $idTravaux   = $unDevis['idTravaux'];

            // Définition de la couleur selon l'id de travaux
            if ($idTravaux == 1) {
                $bg_color = "#FFFF76";
            } elseif ($idTravaux == 2) {
                $bg_color = "#fc8f51";
            } else {
                $bg_color = "#64ABC4";
            }
          ?>
            <article class="col-md-4 mb-4">
              <div class="card" style="width: 18rem; min-height: 9rem;">
                <div class="card-body" style="background-color: <?= $bg_color ?>; border-radius: calc(0.25rem - 1px);">
                    <p class="card-text" style="margin: 0;">
                        <b>Prestataire :</b> <?= $prestataire ?><br>
                        <b>Date du Devis :</b> <?= $dateDev ?><br>
                        <b>Montant TTC :</b> <?= $MontantTTC ?> €<br>
                        <b>Vote :</b> <?= $vote ?>
                    </p>
                </div>
              </div>
            </article>
          <?php } ?>
        </div> <br><br>

        <div style="margin-top: 20px;">
          
          <div style="display: flex; align-items: center; margin-bottom: 15px;">
            <div style="width: 20px; height: 20px; background-color:#FFFF76; border: 1px solid #ccc; margin-right: 15px;"></div>
            <p style="margin: 0;"><b>Rénovation parking</b></p>
          </div>
          
          <div style="display: flex; align-items: center; margin-bottom: 15px;">
            <div style="width: 20px; height: 20px; background-color:#fc8f51; border: 1px solid #ccc; margin-right: 15px;"></div>
            <p style="margin: 0;"><b>Réfection toiture</b></p>
          </div>
          
          <div style="display: flex; align-items: center; margin-bottom: 15px;">
            <div style="width: 20px; height: 20px; background-color:#64ABC4; border: 1px solid #ccc; margin-right: 15px;"></div>
            <p style="margin: 0;"><b>Ravalement façade</b></p>
          </div>

        </div>
        
      </section>
    </div>
  </div>

</body>
</html>