<div class="page-container">
    <div class="form-container">
        <h1 id="inscription-header">formulaire d'inscription</h1>
        <div class="nested-container">
            <div class="empty-block">
            </div>
            <div>
                <form action="" class="registration-form" method="POST">
                    <div class="line">
                        <label for="login">Login </label>
                        <input type="text" id="login" name="login" minlength="8" required>
                    </div>
                    <div class="line">
                        <label for="password">Password </label>
                        <input type="password" id="password" name="password" required><br>
                    </div>
                    <div class="line">
                        <label for="password-repeat">Password (repeat)</label>
                        <input type="password" id="password-repeat" name="password-repeat" required><br>
                    </div>
                    <div class="register-button">
                        <input type="submit" value="send"><br>
                    </div>
                    <div>
                        <span class="message"><?php echo AfficheAlerte($alerte);?></span>
                    </div>
                </form>
            </div>
            <div class="empty-block">
                <p id="tooshort"></p>
                <p id="textsame"></p>
            </div>
        </div>
    </div>
    <div id="retour-lien">
        <a href="index.php">Retour</a>
    </div>
</div>
<script type="module" src="src/inscription.js"></script>