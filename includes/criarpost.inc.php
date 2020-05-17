<?php

if(isset($_POST['post-submit'])){
    require 'dbh.inc.php';

    $post = $_POST['post'];

    session_start();

    $id = $_SESSION['userid'];

    if(empty($post)){
        header("Location: ../index.php?error=emptyfield");
        exit();
    }else{
        $sql = "INSERT INTO posts(post, iduser) VALUES(?, ?)";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror1");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $post, $id);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);
            
            if(mysqli_stmt_get_result($stmt)){
                header("Location: ../index.php?error=sqlerror2");
                exit();
            }else{
                header("Location: ../index.php?criarpost=sucesso");
                exit();
            }
        }
    }
}else{
    header("Location: ../index.php");
    exit();
}