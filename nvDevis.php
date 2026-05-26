

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
  ?>

  <?php
     if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $prestataire   = $_POST['prestataire'];    
      $dateDev       = $_POST['dateDev'];
      $MontantTTC    = $_POST['MontantTTC'];
      $vote          = $_POST['vote'];
      $idTravaux     = $_POST['idTravaux'];
      $idCopropriete = $_POST['idCopropriete'];

      // Appel de votre fonction (assurez-vous que la fonction est déclarée dans un de vos includes)
      $UnDevis = ajouterDevis($bdd, $dateDev, $prestataire, $MontantTTC, $vote, $idTravaux, $idCopropriete);
  }

  // 3. Chargement des données pour les listes déroulantes
  // (On vérifie d'abord si $bdd existe pour éviter le crash)
  if (isset($bdd)) {
      $LesDevis        = getLesDevis($bdd);
      $LesInfos        = getCopropriete($bdd);
      $LesPrestataires = getLesPrestataires($bdd);
      $LesTravaux      = getLesTravaux($bdd);
  } else {
      die("Erreur : La variable \$bdd n'est pas définie. Vérifiez l'inclusion de votre connexion à la base de données.");
  }
  ?>

  <div class="jumbotron">
    <div class="container">
          
      <section class="col-sm-8">
        <br>
        <h1>Ajouter un devis</h1>
        <br>
        
        <?php if (isset($UnDevis) && $UnDevis): ?>
            <div class="alert alert-success">Le devis a bien été enregistré !</div>
        <?php endif; ?>

        <form method="POST" action=""> <label>Choisissez une date :</label>
            <input type="date" id="dateDev" name="dateDev" required>
            <br>
            
            <label>Sélectionner un prestataire : </label>
            <select name="prestataire" required>
                <option value="" selected disabled>-- Choisir un prestataire --</option>
                <?php foreach ($LesPrestataires as $unPrestataire): ?>
                    <option ><?= $unPrestataire['prestataire'] ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            
            <label>Choisissez un montant :</label>
            <input type="number" name="MontantTTC" step="1" min="0" required> €
            <br>

            <label>Vote :</label>
            <select name="vote" required>
                <option value="" selected disabled>-- Choisir un statut --</option>
                <option value="0">En attente de validation</option>
                <option value="1">Accepté</option>
            </select>
            <br>
            
            <label>Sélectionner un type de travaux : </label>
            <select name="idTravaux" required>
                <option value="" selected disabled>-- Choisir un type --</option>
                <?php foreach ($LesTravaux as $unTravail): ?>
                    <option value="<?=$unTravail['idTravaux']?>"><?= $unTravail['libelleTravaux'] ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            
            <label>Sélectionner une copropriété : </label>
            <select name="idCopropriete" required>
                <option value="" selected disabled>-- Choisir une Copropriété --</option>
                <?php foreach ($LesInfos as $uneInfo): ?>
                    <option value="<?=$uneInfo['idCopropriete']?>"><?= $uneInfo['nomImmeuble'] ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            
            <button type="submit">Ajouter</button>
        </form>
      </section>
      
    </div>
  </div>

</body>
</html>