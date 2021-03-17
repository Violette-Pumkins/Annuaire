<?php

// appel fichier externe
    require('Modeles/modele.inc.php');

    var_dump($_GET);

    //initialiation variable 
    $tparam= parse_ini_file("param/param.ini");
    $fichier= $tparam['chemin'].'/'.$tparam['fichierClient'];
    $action='accueil';

    
    
    //gestion liste contacts
    
    if (isset($_GET['action'])) {
        $action=$_GET['action'];
    }
    if ($action=='addContactMAJ' || $action=='searchContactMAJ' || $action=='delContact' ) {
        $nom=$_GET['nom'];
        $prenom=$_GET['prenom'];
        $tel=$_GET['tel'];
    }
    // var_dump($_GET);
    //étapes et traitements

    switch($action){
        case 'accueil':
            $titrepage="Bienvenue sur votre annuaire favoris!";
            $titre= "Accueil";
            require('view/view_header.php');
            require('view/view_accueil.html');
            require('view/view_footer.php');
            break;

        case 'listContact':
        $tListePersonnes=getlisteContacts($fichier);
            $titrepage="Liste des contacts";
            $titre= "Liste";
            require('view/view_header.php');
            require('view/view_listeContacts.php');
            require('view/view_footer.php');
            break;
        case 'addContact':
            $titrepage="Ajoutez un contact!";
            $titre= "Ajout";
            require('view/view_header.php');
            require('view/view_formulaire.php');
            require('view/view_footer.php');
            break;
        case 'addContactMAJ':
            $titrepage="Contact ajouté!";
            $titre= "Vue d'ajout";
            $addContact=addContact($nom, $prenom, $tel, $fichier);
            require('view/view_header.php');
            require("view/view_resultat.php");
            require('view/view_footer.php');
            break;
        case 'searchContact':
            $titrepage="Chercher votre contact!";
            $titre= "Recherche";
            require('view/view_header.php');
            require('view/view_formulaire.php');
            require('view/view_footer.php');
            break;

        case 'searchContactMAJ':
            $titrepage="Contact trouvé!";
            $titre= "Trouvaille";
            $tListePersonnes=searchContacts($nom, $prenom, $tel, $fichier);
            //tester nombre résulatats
            if (count($tListePersonnes)== 0) {
                $titrepage= "Il n'y a pas de contact correspondant";
            }
            elseif (count($tListePersonnes)>1) {
                $titrepage= "il ya plusieurs contact correspondant";
            }
            else {
                $titrepage= "il ya un contact correspondant";
            }
            require('view/view_header.php');
            require("view/view_listeContacts.php");
            require('view/view_footer.php');
            break;
        case 'UpdContact':
            $titrepage="Modifiez votre contact!";
            $titre= "Modifier";
            require('view/view_header.php');
            require('view/view_formulaire.php');
            require('view/view_footer.php');
            break;

        case 'delContact':
            
            $titrepage="Liste des contacts restants";
            $titre= "Contact supprimé avec succés";
            deleteContact($nom, $prenom, $tel, $fichier);
            $tListePersonnes=getlisteContacts($fichier);
            require('view/view_header.php');
            require('view/view_listeContacts.php');
            require('view/view_footer.php');
            break;

    }


?>