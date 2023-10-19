<?php 
global $base_url;

global $isConnected;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- BOOSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
        <style>
             <?php require("css/style.css");?>
        </style>
        
        <!--  FONTAWESOME -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Freedom - <?= $title?></title>
    </head>

    <body>
        <div class="main-container" id="page_<?= $title?>">
            <header class='px-4 py-2 mb-5'>
                <a href='<?= $base_url ?>' class="username flex">
                    <div class='logo'>
                        <img class='w-100' src='uploads/freedom_logo.png'>
                    </div>
                </a>
                <?php if ($isConnected){
                    $username = $_SESSION["users"]["username"];
                    
                    $img = $_SESSION["users"]["img"];
                    ?> 
                    <div class="dropdown-nav">
                        <a class="img dropdown-button" href="#" >
                            <img class='w-100' src='uploads/<?=$img?>?<?= time() ?>' alt='<?= getUserImage($post['id_user'])?>'>
                        </a>
                        
                        <div class="dropdown-list py-4 px-3">
                            
                            <p>Bonjour, <?= $username?></p>
                            <hr>
                            <a href='<?= $base_url ?>?page=profile' class="profile">Mon Profil</a>
                            <a href='<?= $base_url ?>?page=friends' class="profile">Mes Amis</i></a>
                            <a href='<?= $base_url ?>?page=logout' class="logout">Me Déconnecter</a>
                        </div>
                    </div>
                    
                    <?php } elseif($title !== 'connexion' && $title !== 'inscription') {?>
                    <a href="<?=$base_url?>?page=login" class="account">
                    <i class="fa-solid fa-person-walking-arrow-right"></i>
                    </a>
                       
                <?php }?>
            </header>
                <?= $content?>
            </main>
            
            <?php if ($isConnected){?>
            <!-- FOOTER -->
            <footer class="text-center text-lg-start position-sticky">
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    ©  <?= date("Y");?> Copyright:
                    <a class="text-light" href="<?= $base_url?>">freedom.com</a>
                </div>
            </footer>
            <?php }?>
        </div>

        <!-- BOOSTRAP -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>        
    </body>
</html>