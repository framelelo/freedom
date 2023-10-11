<?php
function showUpdatePage() {
$title="Modifier mon profil";
    global $isConnected;
    global $base_url;
        ob_start();
?>
    <h1><?= $title?></h1>
    <div class="container container_form px-4">
       
      <p class="profile_name">
        <?php  
        if($isConnected) {?>
            <form method="POST">
                <div class="mb-4">
                    <input type="radio" name="gender" value="Monsieur" required/>
                    <label>M</label>
                    <input type="radio" name="gender" value="Madame"/>
                    <label>F</label>
                </div>
                <div class="mb-4">
                    <input type="text" name="username" class="form-control px-2" id="login_id" placeholder="Identifiant" required>
                </div> 
                <div class="mb-4">
                    <input type="email" name="email" class="form-control px-2" placeholder="Email" required>
                </div> 
                <div class="mb-4">
                    <input type="password" name="password" class="form-control px-2" id="login_password" placeholder="Mot de passe" required>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="w-100 btn btn-primary">VALIDER</button>
                </div>
            </form>
        <?php };?>
      </p>
       
    </div>

<?php 

    $content = ob_get_clean();
    require("templates/layout.php");
};?>

