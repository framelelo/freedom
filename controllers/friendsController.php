<?php 
function Displayfriends() {

    $friends = showFriend();

    $myid = $_SESSION["users"]['id'];
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

        Displayfriends();
        
    } else echo 'erreur';
}
