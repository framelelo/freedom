<?php 
function Displayfriends() {
global $base_url;

if (isset($_POST['add_friend'])) {
    $friendId = $_POST['id_friend'];

    // Here you can add the friend to your database or perform any other action
    // For this example, we'll simulate adding the friend by storing their ID in a session variable
    $_SESSION['friends'][] = $friendId;
    
    // Redirect back to the page where the button was clicked
    header("Location: $base_url;"); // Replace with the actual page

}
    showFriendPage();
}

?>