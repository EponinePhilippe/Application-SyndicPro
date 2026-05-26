<?php

function seConnecter()
{// port 3306 si mysql et 3307 si mariadb
   $serveur = 'mysql:host=localhost;port=3306';
   $bdd = 'dbname=lst';
   $user = 'root';
   $mdp = '';
   try {
      $pdo = new PDO($serveur . ';' . $bdd . ';charset=UTF8', $user, $mdp);
   } catch (PDOException $e) {
      echo ('Erreur : ' . $e->getMessage());
   }
   return $pdo;
};

function getCopropriete($bdd) 
{
    $req = "SELECT * FROM copropriete";
    $res = $bdd->query($req);
    $LesInfos = $res->fetchAll();
    return $LesInfos;
};

function getCoproprietaire($bdd) 
{
    $req = "SELECT * FROM coproprietaire";
    $res = $bdd->query($req);
    $LesInfos = $res->fetchAll();
    return $LesInfos;
};

function getLesLotsCoproprietaire($bdd, $idCoproprietaire) 
{
    $req = "SELECT idLot, localisation, tantieme FROM lot WHERE idCoproprietaire=".$idCoproprietaire;
    $res = $bdd->query($req);
    $LesLots = $res->fetchAll();
    return $LesLots;
};

function getLesLotsCopropriete($bdd, $idCopropriete) 
{
    $req = "SELECT idLot, localisation, tantieme FROM lot WHERE idCopropriete=".$idCopropriete;
    $res = $bdd->query($req);
    $LesLots = $res->fetchAll();
    return $LesLots;
};

function getLesDevisCoproprietaire($bdd, $idCopropriete)
{
    $req = "SELECT idDevis, dateDev, prestataire, MontantTTC, vote, idTravaux FROM devis WHERE idCopropriete=".$idCopropriete;
    $res = $bdd->query($req);
    $LesDevis = $res->fetchAll();
    return $LesDevis;
};

function getLesDevis($bdd)
{
    $req = "SELECT idDevis, dateDev, prestataire, MontantTTC, vote, idTravaux FROM devis";
    $res = $bdd->query($req);
    $LesDevis = $res->fetchAll();
    return $LesDevis;
};

function getLesPrestataires($bdd)
{
    $req = "SELECT DISTINCT prestataire FROM devis";
    $res = $bdd->query($req);
    $LesPrestataires = $res->fetchAll();
    return $LesPrestataires;
}

function getLesTravaux($bdd)
{
    $req = "SELECT * FROM travaux";
    $res = $bdd->query($req);
    $LesTravaux = $res->fetchAll();
    return $LesTravaux;
}

function ajouterDevis($bdd, $dateDev, $prestataire, $MontantTTC, $vote, $idTravaux, $idCopropriete)
{
    $req = "INSERT INTO devis(dateDev, prestataire, MontantTTC, vote, idTravaux, idCopropriete)
    VALUES ('$dateDev', '$prestataire', $MontantTTC, '$vote', $idTravaux, $idCopropriete)";
    $res = $bdd->query($req);
    return $res;
}

// function getAppelsFonds($bdd, $idDevis, $pourcentage)
// {
//     $sql = "SELECT c.idCoproprietaire, c.nom, c.prenom, SUM(tantieme) AS totalTantiemes
//     FROM coproprietaire c
//     JOIN lot ON c.idCoproprietaire = lot.idCoproprietaire
//     GROUP BY c.idCoproprietaire, c.prenom, c.nom";

//     $req = $bdd->prepare($sql);
//     $req->execute();

//     $lesCopros = $req->fetchAll();

//     $montantDevis = getMontantDevis($bdd, $idDevis);

//     foreach($lesCopros as &$copro)
//     {
//         $copro['appelFonds'] =
//             $montantDevis
//             * ($pourcentage / 100)
//             * ($copro['totalTantiemes'] / 10000);
//     }

//     return $lesCopros;
// }

// function getAppelsFonds($bdd, $idDevis, $pourcentage)
// {
function getAppelsFonds($bdd, $idDevis)
{
    $montant = getMontantDevis($bdd, $idDevis);

    // structure fixe du PV
    $appels = [
        ["date" => "01-12-2023", "pourcentage" => 10],
        ["date" => "01-01-2024", "pourcentage" => 30],
        ["date" => "01-03-2024", "pourcentage" => 40],
        ["date" => "01-05-2024", "pourcentage" => 20]
    ];

    // récupération copropriétaires + tantièmes
    $sql = "SELECT c.idCoproprietaire, c.nom, SUM(l.tantieme) AS totalTantiemes
        FROM coproprietaire c
        JOIN lot l ON c.idCoproprietaire = l.idCoproprietaire
        GROUP BY c.idCoproprietaire";

    $copros = $bdd->query($sql)->fetchAll();

    $result = [];

    foreach ($copros as $copro) {

        foreach ($appels as $appel) {

            $result[] = [
                "nom" => $copro['nom'],
                "tantiemes" => $copro['totalTantiemes'],
                "date" => $appel['date'],
                "pourcentage" => $appel['pourcentage'],
                "montant" =>
                    $montant *
                    ($appel['pourcentage'] / 100) *
                    ($copro['totalTantiemes'] / 10000)
            ];
        }
    }

    return $result;
}

function getMontantDevis($bdd, $idDevis)
{
    $req = "SELECT MontantTTC FROM devis WHERE idDevis = $idDevis";
    $res = $bdd->query($req);

    if (!$res) {
        return null; // ou gérer l'erreur
    }

    $row = $res->fetch();

    if (!$row) {
        return null; // aucun devis trouvé
    }

    return $row['MontantTTC'];
}
