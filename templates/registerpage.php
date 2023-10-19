<?php 
function showRegisterPage() {
    $title="inscription";
    ob_start();
    global $base_url;
    ?>    

<div class="container px-4 py-5">
    <h1 class="title mb-4">S'inscrire</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-4">
            <input type="radio" name="gender" value="Monsieur" required/>
            <label>M</label>
            <input type="radio" name="gender" value="Madame"/>
            <label>F</label>
        </div>
        <div class="mb-4">
            <input type="file" name="profile_img" class="form-control px-2" id="profile_img" accept= '.jpeg,.png,.jpg'>
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
        <div class="mb-4">
            <input type="password" name="confirmation_password" class="form-control px-2" id="login_confirmpassword" placeholder="Confirmer mot de passe" required>
        </div>
        <div class="text-center">
            <button type="submit" class="w-100 btn btn-primary">S'INSCRIRE</button>
        </div>
        <div class="text-center py-3">
        <a href='<?= $base_url ?>?page=login'>Déjà client ?</a>
        </div>
    </form>
</div>
<?php
    $content = ob_get_clean();
    require("layout.php");
}
?>
