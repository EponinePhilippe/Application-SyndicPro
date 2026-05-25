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
  // $LesPrestataire=getLesPrestataire($bdd);
  // $LesTravaux=getLesTravaux($bdd);
  $LesDevis=getLesDevis($bdd);
  $LesInfos=getCopropriete($bdd);
  ?>

  <div class="jumbotron">
    <div class="container">

    <?php
          foreach ($LesPrestataire as $unPrestataire) {
            $idPrestataire=$unPrestataire['idPrestataire'];
            $nom=$unPrestataire['nom'];
          }
          foreach ($LesDevis as $unDevis) {
              $idDevis=$unDevis['idDevis'];
              $prestataire=$unDevis['prestataire'];    
              $dateDev=$unDevis['dateDev'];
              $MontantTTC=$unDevis['MontantTTC'];
              $vote=$unDevis['vote'];
              $idTravaux=$unDevis['idTravaux'];
          }
          foreach ($LesInfos as $uneInfo) {
            $idCopropriete=$uneInfo['idCopropriete'];
            $nomImmeuble=$uneInfo['nomImmeuble'];
          }?>

          
      <section class="col-sm-8">
        <br>
        <h1>Ajouter un devis</h1>
        <br>
        <form method="POST" action="nvDevis.php">
            <label >Choisissez une date :</label>
            <input type="date" id="dateDev" name="dateDev"required>

            <br>
            <label>Sélectionner un prestataire : </label>
            <select name="prestataire" required>
            <option value="" selected disabled>-- Choisir un prestataire --</option>
              <?php foreach ($LesPrestataire as $unPrestataire): ?>
                <option value="<?=$unPrestataire['nom']?>">
                  <?= $unPrestataire['nom'] ?>
                </option>
                <?php endforeach; ?>
                
                
            </select>
            <br>
            <label >Choisissez un montant :</label>
            
            <input type="number" name="MontantTTC" step="1" min="0"required>€
            <br>

            <label for="date">Vote :</label>
            <select name="vote">
            <option value="" selected disabled>-- Choisir un statut --</option>
            <option value="0"required>attente de validation</option>
            <option value="1"required>accepté</option>
              </select>
            <br>
            <label>Sélectionner un type de travaux : </label>
            <select name="idTravaux" required>
            <option value="" selected disabled>-- Choisir un type --</option>
              <?php foreach ($LesTravaux as $unTravail): ?>
                <option value="<?=$unTravail['idTravaux']?>">
                  <?= $unTravail['libelleTravaux'] ?>
                </option>
                <?php endforeach; ?>
                
                
            </select>
            <br>
            <label>Sélectionner une copropriété : </label>
            <select name="idCopropriete" required>
            <option value="" selected disabled>-- Choisir une Copropriété --</option>
              <?php foreach ($LesInfos as $uneInfo): ?>
                <option value="<?=$uneInfo['idCopropriete']?>">
                  <?= $uneInfo['nomImmeuble'] ?>
                </option>
                <?php endforeach; ?>
                
                
            </select>
            <br>
            <button type="submit" value="Ajouter">Ajouter</button>
        </form>
        <div class="row">
            <?php if ($_SERVER["REQUEST_METHOD"] === "POST") :
               var_dump($_POST);
               $prestataire=$_POST['prestataire'];    
               $dateDev=$_POST['dateDev'];
               $MontantTTC=$_POST['MontantTTC'];
               $vote=$_POST['vote'];
               $idTravaux=$_POST['idTravaux'];
               $idCopropriete=$_POST['idCopropriete'];

              $UnDevis = ajouterUnDevis($bdd, $dateDev, $prestataire, $MontantTTC, $vote, $idTravaux, $idCopropriete);
              endif;
            ?>
        </div>
      </section>
      
    </div>
  </div>
  <?php include('includeLst/footerLst.php'); ?>
</body>
</html>
