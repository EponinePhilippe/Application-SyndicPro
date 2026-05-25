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
  $LesInfos = getCopropriete($bdd);
  ?>

  <div class="jumbotron">
    <div class="container">
      <section>
        <h1>Les Copropriétés</h1>
        <div class="row">

          <?php
          foreach ($LesInfos as $uneInfo) {
            $idCopropriete = $uneInfo['idCopropriete'];
            $nomImmeuble = $uneInfo['nomImmeuble'];
            $rue = $uneInfo['rue'];
            $cp = $uneInfo['cp'];
            $ville = $uneInfo['ville'];
          ?>

            <article class="col-md-4">
              <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-text"><h5>
                    <p class="card-text"><?php echo "Nom : " . $nomImmeuble . "<br>Rue : " . $rue . "<br>Code Postal : " . $cp . "<br>Ville : " . $ville?></p>
                    <a href="lotsCopropriete.php?idCopropriete=<?php echo $idCopropriete ?>" class="card-link">Voir les lots </a>
                    <a href="devis.php?idCopropriete=<?php  echo $idCopropriete ?>" class="card-link">Voir les devis </a>
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