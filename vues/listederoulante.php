<form action="" method="GET">
    <label for="categorie">Categorie:</label>
    <input type="hidden" name="cible" value="annonces">
    <input type="hidden" name="function" value="listecategorie">
    <select id="categorie" name="categorie">
    <?php foreach ($liste as $categorie) {
        echo '<option value="' . htmlspecialchars($categorie['nom']) . '">' . htmlspecialchars($categorie['nom']) . '</option>';
    } ?>
    </select>
    <input type="submit" value="Submit">
</form>


<?php if(isset($alerte)) { echo AfficheAlerte($alerte);} ?>
<p><a href="index.php">Retour</a></p>