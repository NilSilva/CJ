<?php

if(isset($_POST['login-submit'])){
    require 'dbh.inc.php';

    $email = $_POST['UserName'];
    $pwd = $_POST['password'];

    if(empty($email) || empty($pwd)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $email, $email);
            mysqli_stmt_execute($stmt);
            
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($pwd, $row['pwd']);

                if($pwdCheck == false){
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }else if($pwdCheck == true){
                    session_start();

                    $_SESSION['userid'] = $row['idUser'];
                    $_SESSION['userUid'] = $row['username'];

                    header("Location: ../index.php?login=success");
                    exit();
                }else{
                    header("Location: ../index.php?error=wrongpwd");
                    exit();
                }
            }else{
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
}else{
    header("Location: ../index.php");
    exit();
}