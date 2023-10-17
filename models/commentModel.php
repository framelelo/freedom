<?php
function getAllCommentsById($id_post)
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM comments where id_post = :id ORDER BY creation DESC");
    $query->execute([
        "id" => $id_post
    ]);
    $comments = $query->fetchAll();
    return $comments;
}

function createComment($id_user, $id_post, $content)
{
    global $pdo;
    try {
        $query = $pdo->prepare("INSERT INTO comments (id_user,id_post, text, creation) VALUES (:u,:p, :t, :d)");
        $query->execute([
            "u" => $id_user,
            "p" => $id_post,
            "t" => $content,
            "d" => date("Y-m-d H:i:s")
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

