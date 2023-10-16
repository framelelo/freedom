<?php

function isLiked($id_user, $id_post)
{
    global $pdo;
    try {
        $query = $pdo->prepare("SELECT * FROM likes WHERE id_user = :id_user AND id_post = :id_post");
        $query->execute([
            "id_user" => $id_user,
            "id_post" => $id_post
        ]);
        $liked = $query->fetch();
        if (!$liked) {
            return false;
        }
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function createLiked($id_user, $id_post)
{
    global $pdo;
    try {
        $query = $pdo->prepare("INSERT INTO likes (id_user, id_post) VALUES (:id_user, :id_post)");
        $query->execute([
            "id_user" => $id_user,
            "id_post" => $id_post
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

function deleteLiked($id_user, $id_post)
{
    global $pdo;
    try {
        $query = $pdo->prepare("DELETE FROM likes WHERE id_user = :id_user AND id_post = :id_post");
        $query->execute([
            "id_user" => $id_user,
            "id_post" => $id_post
        ]);
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}