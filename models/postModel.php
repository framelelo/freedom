<?php 

function getPosts() {
    global $pdo;

    $query= $pdo->prepare("SELECT * FROM posts ORDER BY date DESC");
    $query->execute([]);
  
    $posts = $query->fetchAll();
    return $posts;    
}



function createPost($id_user, $post_img, $post_title, $post_content) {
  global $pdo;
    try {
      $query= $pdo->prepare("INSERT INTO posts ( id_user, img, title, text, date) VALUES ( :i, :p, :t, :c,:d)");
        
      $query->execute([
      'i' => $id_user,
      'p' => $post_img,
      't' => $post_title, 
      'c' => $post_content,
      'd' => date("Y-m-d H:i:s")

    ]);
    return true;
  } 
  catch (PDOEXCEPTION $e) {
      return false;
  }
}



function getPost($id_post) { 
  global $pdo;
try {
  $query= $pdo->prepare("SELECT * FROM posts WHERE Id = :i ORDER BY date DESC");
  $query->execute([
    'i' => $id_post

]);

  $post = $query->fetchAll();
    return $post;    
  }

  catch (PDOEXCEPTION $e) {
    return false;
  }
}

?>