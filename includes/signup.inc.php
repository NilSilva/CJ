<?php

if(isset($_POST['signup-submit'])){
    require 'dbh.inc.php';

    $userName = $_POST['UserName'];
    $email = $_POST['Email'];
    $pwd = $_POST['password'];
    $pwdv = $_POST['passwordV'];

    if(empty($userName) || empty($email) || empty($pwd) || empty($pwdv)){
        header("Location: ../signup.php?error=emptyFields&userName=".$userName."&email=".$email);
        exit();
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $userName)){
        header("Location: ../signup.php?error=inv");
        exit();
    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=invEmail&userName=".$userName);
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
        header("Location: ../signup.php?error=invUserName&email=".$email);
        exit();
    }else if($pwd !== $pwdv){
        header("Location: ../signup.php?error=pwdDif&userName=".$userName."&email=".$email);
        exit();
    } else{
        //$sql = "SELECT username FROM users WHERE username = ?";
        $sql = "SELECT username FROM users WHERE username=?";

        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlError1");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $userName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck > 0){
                header("Location: ../signup.php?error=userTaken&email=".$email);
                exit();
            }else{
                //$sql = "INSERT INTO users (username, email, pwd) VALUES (?, ?, ?)";
                $sql = "INSERT INTO users (username, email, pwd) VALUES (?, ?, ?)";

                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlError2");
                    exit();
                }else{
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $userName, $email, $hashedPwd);
                    
                    mysqli_stmt_execute($stmt);

                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}else{
    header("Location: ../signup.php");
    exit();
}