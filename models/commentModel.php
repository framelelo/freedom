<?php
function createComment($id_user, $id_post, $content)
{
    global  $pdo;
    try {
        $query = $pdo ->prepare("INSERT INTO comments (id_user, id_post, text, date) VALUES (:i, :p, :c, :d)");
        $query->execute([
            "i" => $id_user,
            "p" => $id_post,
            "c" => $content,
            'd' => date("Y-m-d H:i:s")
        ]);
    }
    catch (PDOEXCEPTION $e) {
        return false;
    }

}

function getComments($id_post)
{
    global $pdo;
    try {
        $query = $pdo ->prepare("SELECT * FROM comment WHERE id_post = :i ORDER BY id DESC");
        $query->execute([
            "i" => $id_post
        ]);
        $comment = $query->fetchAll();
        return $comment;
    }
    catch (PDOEXCEPTION $e) {
        return false;
    }
}