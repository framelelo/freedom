<?php
function showProfilePage() {
$title="Profile";
    global $base_url;
        ob_start();
?>
    
    <div class="container container_form px-4">
       
<div class="card p-4">
  
      <h1 class='text-center'><?= $title?></h1>
      <p class="profile_name">
        <?php  
            $gender = $_SESSION["users"]["gender"];
            $username = $_SESSION["users"]["username"];
            $email= $_SESSION["users"]["email"];
            $password = $_SESSION["users"]["password"];
            
            echo '<p>Civilité : '. $gender . '</p>';
            echo '<p>Pseudo : '. $username . '</p>';
            echo '<p>Email : '. $email . '</p>';
            echo '<p>Mot de passe : Mot de passe </p>';
        ?>
        <a class='btn btn-primary my-3' href='<?= $base_url?>?page=update'>Modifier</a>
      </p>
</div>
       
    </div>

<?php 

    $content = ob_get_clean();
    require("layout.php");
};?>

