<?php

    //ACTION DES BOUTONS DE SELECTION DE PERIODES DE STAGES//



    $utilisateur = new Utilisateurs (["idUtilisateur" => 2, "nomUtilisateur" => "COURQUIN", "prenomUtilisateur" => "Pierre", "emailUtilisateur" => "toto6@test.fr" , "mdpUtilisateur" => "user" , "datePeremption" => "", "idRole" => 4]);
    // $a1 = new agence(["Nom" => "tutu", "adresse" => "12 rue toto","restauration" => "restaurant d'entreprise" ,"codePostal" => "59520" , "ville" => "Lille"]);
    $_SESSION['utilisateur'] = $utilisateur;
    if ($_SESSION['utilisateur']->getIdRole() == 4) {
        $email = $_SESSION['utilisateur']->getEmailUtilisateur();
        $stagiaire = StagiairesManager::getByEmail($email);
        $nbPeriodesStages = StagiaireFormationManager::nbPeriodesStages($stagiaire->getIdStagiaire(),NULL);
        // var_dump($stagiaire);
        $participation = ParticipationsManager::getByStagiaire($stagiaire->getIdStagiaire());
        // var_dump($participation);
        $periodeStage = StagiaireFormationManager::nb
    }
    echo' <section>';
        // $nbPeriodesStages = 5;
    if ($nbPeriodesStages > 1) {
        $i = 0;
        $j = 1;
        while ($i < $nbPeriodesStages) {
            echo '
            <div class="colonne">
                <div>Periode de stage '. $j.'</div>
                <div>Du '. $participation[$i]->getDateDebut().' au  '. $participation[$i]->getDateFin().'</div>

                <a href="index.php?page=FormFRStagiaire&idPeriodStage='.$part">
                    <button type="submit" class="bouton">Completer la fiche info  </button>
                </a>
            </div>
            ';

            $i++; 
            $j++;
        }

    } else {

        echo ' 
       

            
            <form action="" method="POST">

                <div class=" ">
                    <div class="info colonne ">
                        <label for="prenom">Prenom :</label>
                        <input type="text" id="prenom" name="prenom" value="" required pattern="[a-zA-Z- ]{3,}">
                    </div>
                    <div class="info colonne ">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" value="" required pattern="[a-zA-Z- ]{3,}">
                    </div>
                </div>
                <div >
                    <div class="info  centerItem colonne">
                        <label for="homme">Homme</label>
                        <input type="radio" required id="genre" name="genre" value="H">
                    </div>
                    <div class="info  centerItem colonne">
                        <label for="femme">Femme</label>
                        <input type="radio" required id="genre" name="genre" value="F">
                    </div>
                    <div class="info colonne  grande">
                        <label for="numSecu">Votre Numero de securite social :</label>
                        <input type="text" id="numSecu" name="numSecu" required pattern="\d{13}" value="">
                    </div>
                </div>

                <div >
                    <div class="info colonne center">
                        <label for="numbenef">Votre numero de beneficiaire :</label>
                        <input type="text" id="numBenef" name="numbenef" value="" required pattern="\d{8}">
                    </div>
                    <div class="info colonne center">
                        <label for="ddn">Votre date de naissance :</label>
                        <input type="date" id="ddn" name="ddn" value="" required>
                    </div>
                </div>

                <div >
                    <div class="info colonne center">
                        <label for="emailTuteur">Email de votre tuteur :</label>
                        <input type="text" id="emailTuteur" name="emailTuteur" value="" required pattern="^[a-z]+[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$" >                
                    </div>
                </div>
                <div >
                    <div class="info colonne center">
                        <button class="bouton" type="submit"><i class="fas fa-paper-plane"></i> Envoyer</button>
                    </div>
                </div>
                <div >
                    <div class="info center">
                        <span class="erreur"></span>
                    </div>
                </div>

            </form>

        ';
    }
    echo'</section>';
?>