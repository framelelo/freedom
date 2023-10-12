<?php

function homeAction(){
        $posts = getPosts();
        
        showHomePage($posts);
};
?>