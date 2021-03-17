<?php


    /**
     *  BLABLA
     */
    function getListeContacts($fichier) {
        $tListePersonnes = [];
        if (file_exists($fichier)) {
            $tab = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); 
            $NbLignes = count($tab);
            for ($i = 0; $i < $NbLignes; $i++) {
                $tPersonne = explode("**", $tab[$i]);
                $tListePersonnes[]=$tPersonne;
            }
        }
        else {
            die ("Le fichier ".$fichier." n'existe pas");
        }

        return $tListePersonnes;
    }

    function addContact($nom, $prenom, $tel, $fichier){

        $contact =$nom."**".$prenom."**".$tel."\n";
            file_put_contents($fichier, $contact, FILE_APPEND);
    }


    function searchContacts($nom, $prenom, $tel, $fichier) {

        if (file_exists($fichier)) {
            //création tb pour contact correspondant
            $tContactOK=array();
            //récup chaque tb d'un contact
            $tab=getListeContacts($fichier);
            /**
             * pour cheque ligne du contact (nom/prenom/tel) 
             * on rajouter cette ligne dans le tb de correpondance puis on le retourne
             */

            foreach ($tab as $tContact) {

                if(stristr($tContact[0], $nom))

                    $tContactOK[]=$tContact;
                
                // elseif (stristr($tContact[1], $prenom)

                //     $tContactOK[]=$tContact
                
                // elseif (stristr($tContact[2], $tel)

                //     $tContactOK[]=$tContact
            
            
            }
            return $tContactOK;
        }
    }

    function deleteContact($nom, $prenom, $tel, $fichier){
        //récupère la liste de tb
        $tab = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); 
        //contact à supprimé
        $contact = $nom."**".$prenom."**".$tel;
        //récupération index du contact à supprimer
        $key= array_search($contact, $tab);
        //supprime le-dit contact dans le tableau.
        unset($tab[$key]);
        // Sauvegarde le fichier de contacts
        file_put_contents($fichier, implode("\n", $tab));
        var_dump($tab);
    }



?>