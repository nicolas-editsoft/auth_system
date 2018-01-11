<section>
    <div id="form_login">
        <h2><u>Connexion</u></h2>
        <form method="post" action="/conf/login.php">
            <p><label for="inputname" >Nom d'utilisateur : </label></p>
            <div style="margin: 15px;">
                <input type="text" name="login" id="login"  maxlength="25" required/>
            </div>
            <p><label for="prenom" >Mot de Passe : </label></p>
            <div style="margin: 15px;">
                <input type="password" name="password" id="password"  maxlength="16" minlength="8" required/>
            </div>
            <input style="margin-bottom: 10px;" type="submit" value="valider" />
        </form>
        <?php if (array_key_exists('errors', $_SESSION)): ?>
            <div class="alert" style="color:red;">
                <?= implode('<br>', $_SESSION['errors']); ?>
            </div>
            <script>$(function () {
                    $("#mask").fadeIn();
                    $("#form_login").fadeIn();
                });</script>
        <?php endif; ?>
    </div>
    <div id="mask" onclick="close_mask()"></div>
</section>