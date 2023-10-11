<?php
function showProfilePage() {
$title="Profile";
    global $base_url;
        ob_start();
?>
    <h1><?= $title?></h1>
    <div class="container container_form px-4">
       
      <p class="profile_name">
        <?php  
            $gender = $_SESSION["users"]["gender"];
            $username = $_SESSION["users"]["username"];
            $email= $_SESSION["users"]["email"];
            $password = $_SESSION["users"]["password"];
            
            echo 'Civilité : '. $gender . '<br>';
            echo 'Pseudo : '. $username . '<br>';
            echo 'Email : '. $email . '<br>';
            echo 'Mot de passe : Mot de passe <br>';
        ?>
        <a href='<?=  $base_url?>?page=update'>Modifier</a>
      </p>
       
    </div>

<?php 

    $content = ob_get_clean();
    require("templates/layout.php");
};?>

