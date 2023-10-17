<?php
function showProfilePage() {
$title="profil";
    global $base_url;
        ob_start();
?>
    
<div class="container px-4">
       
    <div class="card p-4">
        <h1 class='text-center'><?= $title?></h1>
        <div class="profile flex">
            <?php  
                $gender = $_SESSION["users"]["gender"];
                $username = $_SESSION["users"]["username"];
                $email= $_SESSION["users"]["email"];
                $image = $_SESSION["users"]["img"];
                echo "<div class='img-profile'>
                        <img class='w-100' src='uploads/$image' >
                    </div>";
                echo '<div class="profile-details"><p>Civilité : '. $gender . '</p>';
                echo '<p>Pseudo : '. $username . '</p>';
                echo '<p>Email : '. $email . '</p>';
                echo '<p>Mot de passe : Mot de passe </p> </div>';
            ?>
            
        </div>
        <a class='btn btn-primary my-3' href='<?= $base_url?>?page=update'>Modifier</a>
        
            
    </div>
       
</div>

<?php 

    $content = ob_get_clean();
    require("layout.php");
};?>

