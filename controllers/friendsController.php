<?php 
function Displayfriends() {

    $myid = $_SESSION["users"]['id'];
    $friends = showFriend($myid);

    $suggestions = showSuggestion($myid);
        
    showFriendPage($friends,$suggestions);
}
function ManageFriend() {
    global $base_url;

    if (isset($_GET["a"])) {

        $action = $_GET["a"];
        $id_user = $_SESSION["users"]['id'];
        $id_friend = $_GET["id_friend"];
        
        if ($action == 'add'){

            addFriend($id_user, $id_friend);
        }
        if ($action == 'delete'){
            removeFriends($id_friend);
        }
       
        header("location: $base_url?page=friends");
        
        
    } else echo 'erreur';
}
