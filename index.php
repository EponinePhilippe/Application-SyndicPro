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
        <br>
        <h1>Bienvenue sur SyndicPro</h1>
        <br>
        <br>
            <p>Ce site permet la consultation des copropriétés, de leur devis associés et de leur lots, des copropriétaires et de leur lots ainsi que l'ajout de nouveaux
                devis.
            </p>
      </section>
    </div>
  </div>

</body>

</html>