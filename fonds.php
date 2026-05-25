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

    // $idDevis = (int)$_GET['idDevis'];
    $LesDevis=getLesDevis($bdd);
    $MontantDevis =getMontantDevis($bdd, $idDevis);
    $LesAppels=getAppelsFonds($bdd, $idDevis);
    var_dump($LesAppels);
?>

<?php foreach($LesAppels as $appel){ ?>

<div class="card mb-3">
    <div class="card-body">

        <h5>
            <?php echo $appel['nom']; ?>
        </h5>

        <p>
            Tantièmes :
            <?php echo $appel['totalTantiemes']; ?>
        </p>

        <p>
            Montant à payer :
            <strong>
                <?php echo number_format(
                    $appel['montant'],
                    2,
                    ',',
                    ' '
                ); ?>
                €
            </strong>
        </p>

    </div>
</div>

<?php } ?>
 <?php include('includeLst/footerLst.php'); ?>

</body>

</html>