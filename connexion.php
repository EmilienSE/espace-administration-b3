    <?php require "header.php"; ?>
    <?php
    session_start();
    include('php/connect.php');
    if (isset($_POST['formconnexion'])) {
        $mailconnect = htmlspecialchars($_POST['mail']);
        $mdpconnect = $_POST['password'];

        if (!empty($mailconnect) && !empty($mdpconnect)) {
            $requser = $pdo->prepare("SELECT * FROM admin_account WHERE mail = ? AND enabled = 1");
            $requser->execute(array($mailconnect));
            $userexist= $requser->rowCount();
            if ($userexist===1) {
                $userinfo = $requser->fetch();
                if (password_verify($mdpconnect, $userinfo['password'])) {
                    $_SESSION['idAdminAccount']= $userinfo['idAdminAccount'];
                    $_SESSION['mail']=$userinfo['mail'];
                    $_SESSION['name']=$userinfo['name'];
                    header('location: Categories.php?id='.$_SESSION['idAdminAccount']);
                } else {
                    $error='Mauvais identifiants';
                }

            }
        } else {
            $error= 'Les champs doivent être complétés';
        }

    }

    ?>
    <div class="container-form">
	    <div class="Content">
		    <form id="form-content-login" method="post" action="connexion.php">
			    <label for="mail">Mail :</label>
			    <input type="text" id="mail" name="mail"><br><br>
			    <label for="password">Mot de passe :</label>
			    <input type="password" id="password" name="password"><br><br>
			    <input name="formconnexion" type="submit" value="SE CONNECTER">
		    </form>
            <?php
            if(isset($error)) {
                echo $error;
            }
            ?>
	    </div>
    </div>

   <?php require "footer.php"; ?>