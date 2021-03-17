<form action="index.php" method ="get">

    <label for="nom">nom:</label>
        <input type="text" name="nom"> <br><br>

    <label for="prénom">prénom:</label>
        <input type="text" name="prenom"><br><br>

    <label for="téléphone">téléphone:</label>
        <input type="text" name="tel"><br><br>
        
        <input type="hidden" name="action" value="searchContactMAJ">

    <button type="submit" name="search" value="search">Rechercher</button>

</form>