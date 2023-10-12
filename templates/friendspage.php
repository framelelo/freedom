<?php
function showFriendPage() {
$title="Amis";
        global $isConnected;
        ob_start();
?>
    <h1><?= $title?></h1>
    <div class="container container_form px-4">

        
    </div>

<?php  

    $content = ob_get_clean();
    require("templates/layout.php");
};?>

