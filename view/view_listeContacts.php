<?php

    var_dump($tListePersonnes);
        foreach ($tListePersonnes as $value) {?> 
            <br><label for="nom">nom:</label> 
            <?php
                echo($value[0]);
            ?>
            <br> <label for="prénom">prénom:</label>
            <?php
                echo($value[1]);
            ?>
            <br><label for="téléphone">téléphone:</label>
            <?php
                echo($value[2]);
            ?><br>
            <?php
        }
        if ($action =='searchContactMAJ' && count($tListePersonnes)==1) {
            //ajout bouton supprimer et modifier
            ?>
            <form action="index.php" method="get">
            <input type="hidden" name="nom" value="<?php echo $value[0] ?>">
            <input type="hidden" name="prenom" value="<?php echo $value[1] ?>">
            <input type="hidden" name="tel" value="<?php echo $value[2] ?>"><br><br>
            <input type="submit" name= "action" value="delContact">
            <input type="submit" name="action" value="updContact">

            </form>
            <?php
        }   
?>