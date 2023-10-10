<?php 

function createPost($id_user, $post_title, $post_content) {
    global $pdo;
      try {
        $query= $pdo->prepare("INSERT INTO posts ( id_user, title, text, date) VALUES ( :i, :t, :c,:d)");
          
        $query->execute([
        'i' => $id_user,
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

function getPosts() {
    global $pdo;

    $query= $pdo->prepare("SELECT * FROM posts");
    $query->execute([]);
  
    $posts = $query->fetchAll();
    return $posts;    
}

function getPost($id) { 
  global $pdo;
try {
  $query= $pdo->prepare("SELECT * FROM posts WHERE Id = :i");
  $query->execute([
    'i' => $id

]);

  $post = $query->fetchAll();
    return $post;    
  }

  catch (PDOEXCEPTION $e) {
    return false;
  }
}

?>