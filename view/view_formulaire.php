

<form action="index.php" method ="get">

    <label for="nom">nom:</label>
        <input type="text" name="nom"> <br><br>

    <label for="prénom">prénom:</label>
        <input type="text" name="prenom"><br><br>

    <label for="téléphone">téléphone:</label>
        <input type="text" name="tel"><br><br>

        <input type="hidden" name="action" value="<?php echo $action. "MAJ"?>">

    <button type="submit" name="add" value="add">Validez</button>

</form>