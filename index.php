    <?php require "header.php"; ?>

    <div class="container-form">
        <div class="Content">
            <form id="form-content" method="post" data-action="php/adminAccount.php">
                <label for="mail">Mail :</label>
                <input type="text" id="mail" name="mail"><br><br>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" value="SE CONNECTER">
            </form>
        </div>
    </div>

   <?php require "footer.php"; ?>