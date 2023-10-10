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
        <title>Kozer - <?= $title?></title>
    </head>

    <body>
        <div class="main-container" id="page_<?= $title?>">
            <header>
                <?php if ($isConnected){
                    $gender = $_SESSION["users"]["gender"];
                    $username = $_SESSION["users"]["username"];
                    ?> 
                    <p>Bonjour, <?= $gender . ' '. $username?></p>
                    <a href='<?= $base_url ?>?page=logout' class="logout"><i class="fas fa-sign-out-alt"></i></a>
                    <a href='<?= $base_url ?>?page=profile' class="profile"><i class="fas fa-user"></i></a>
                <?php } else {?>
                    <a href="<?=$base_url?>?page=login" class="account"><i class="fas fa-user"></i></a>
                            
                <?php };?>
            </header>
                <?=$content?>
            </main>
        </div>
        <script src="<?= $base_url.'/js/script.js'?>"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- BBOSTRAP -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>