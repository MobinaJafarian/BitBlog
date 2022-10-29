<?php
     require_once '../../functions/helpers.php';
     require_once '../../functions/pdo_connection.php';
     require_once '../../functions/auth.php';



     if(isset($_GET['post_id']) && $_GET['post_id']){

        $query = "SELECT * FROM posts WHERE id = ?;";
        $statement = $pdo->prepare($query);
        $statement->execute([$_GET['post_id']]);
        $post = $statement->fetch();

        if($post !== false){
            $status = ($post->status == 10) ? 0 : 10;
            // if($post->status == 10){
            //     $status = 0
            // }
            // else{
            //     $status = 10;
            // }
            $query = "UPDATE posts SET status = ? WHERE id = ? ;";
            $statement = $pdo->prepare($query);
           $statement->execute([$status, $_GET['post_id']]);
        }
     }

     redirect('panel/post');