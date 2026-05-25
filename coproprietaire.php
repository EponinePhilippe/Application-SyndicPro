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
  $LesInfos = getCoproprietaire($bdd);
  ?>

  <div class="jumbotron">
    <div class="container">
      <section>
        <h1>Les Copropriétaires</h1>
        <div class="row">

          <?php
          foreach ($LesInfos as $uneInfo) {
            $idCoproprietaire = $uneInfo['idCoproprietaire'];
            $civilite = $uneInfo['civilite'];
            $nom = $uneInfo['nom'];
            $prenom = $uneInfo['prenom'];
            $telephone = $uneInfo['telephone'];
            $rue = $uneInfo['rue'];
            $cp = $uneInfo['cp'];
            $ville = $uneInfo['ville'];
          ?>

            <article class="col-md-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-text">
                      <?php if ($civilite == 1){
                        $a = "M";
                      }
                      else{
                        $a = "F";
                      } ?>
                    <?php echo "Sexe : ". $a . "<br> Nom : ". $nom . "<br>Prénom : ".$prenom."<br>Rue : " . $rue . "<br>Code Postal : " . $cp . "<br>Ville : " . $ville . "<br> Telephone : " . $telephone?></p>
                    <a href="lotsCoproprietaire.php?idCoproprietaire=<?php echo $idCoproprietaire ?>" class="card-link">Voir les lots</a> 
                    <a href="fonds.php?idCoproprietaire=<?php echo $idCoproprietaire ?>" class="card-link">Voir les fonds</a> 
                    <h5>
                </div>
              </div>

              <br>
            </article>
          <?php } ?>
        </div>
      </section>
    </div>
  </div>

  <?php include('includeLst/footerLst.php'); ?>

</body>

</html>