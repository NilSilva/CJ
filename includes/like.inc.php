<?php

if(isset($_POST['like-submit'])){
    require 'dbh.inc.php';
    
    $post = $_POST['postid'];
    $user = $_POST['userid'];

    $sql = "INSERT INTO likes(iduser, idpost) VALUES(?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../index.php?error=sqlerror1&iduser=".$user."&idpost=".$post);
        exit();
    }else{
        mysqli_stmt_bind_param($stmt, "ss", $user, $post);
        mysqli_stmt_execute($stmt);
            
        $result = mysqli_stmt_get_result($stmt);
            
        if(mysqli_stmt_get_result($stmt)){
            header("Location: ../index.php?error=sqlerror2");
            exit();
        }else{
            header("Location: ../index.php?like=sucesso");
            exit();
        }
    }
}else{
    header("Location: ../index.php");
    exit();
}