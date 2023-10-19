<?php 
    function showLoginPage() {
        $title="connexion";
        global $base_url;  
        ob_start(); ?> 

<div class="px-4 py-5 container">
    <h1 class="title mb-4"><?= $title?></h1>
    <form method="POST">
        <div class="mb-4">
           <input type="text" name="username" class="form-control px-2" id="login_id" placeholder="Identifiant" required>
        </div> 
        <div class="mb-4">
            <input type="password" name="password" class="form-control px-2" id="login_password" placeholder="Mot de passe" required>
        </div>

        <div class="text-center">
            <button type="submit" class="w-100 btn btn-primary">SE CONNECTER</button>
        </div>
        <div class="text-center py-3">
        <a href='<?= $base_url ?>?page=register'>Pas encore de compte ?</a>
        </div>
    </form>
</div>

<?php
    $content = ob_get_clean();
    require("layout.php");
    };?>
