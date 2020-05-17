<?php
    require "header.php";
?>

    <main>
        <?php
            if(isset($_SESSION['userid'])){
                echo '
                    <form action="includes/criarpost.inc.php" method="post">
                        <textarea placeholder="Post..." rows = "5" cols = "50" name = "post"></textarea>

                        <button type="submit" name="post-submit">Criar</button>
                    </form>
                ';
            }else{
                echo "<p>Logged out</p>";
            }

            require 'includes/dbh.inc.php';

            $sql = "SELECT * FROM posts";

            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../index.php?error=sqlerror");
                exit();
            }else{
                mysqli_stmt_execute($stmt);
                    
                $result = mysqli_stmt_get_result($stmt);

                foreach($result as $row) {
                    $sql = "SELECT username FROM users WHERE idUser = ".$row['iduser'];
                    
                    $stmt = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../index.php?error=sqlerror");
                        exit();
                    }else{
                        mysqli_stmt_execute($stmt);
                    
                        $result2 = mysqli_stmt_get_result($stmt);

                        $username = mysqli_fetch_assoc($result2);

                        $sql = "SELECT count(*) likesNum FROM likes WHERE idpost = ".$row['id'];
                    
                        $stmt = mysqli_stmt_init($conn);

                        mysqli_stmt_prepare($stmt, $sql);

                        mysqli_stmt_execute($stmt);
                    
                        $result3 = mysqli_stmt_get_result($stmt);

                        $likes = mysqli_fetch_assoc($result3);

                        if(isset($_SESSION['userid'])){
                            echo $username['username']." | ".$row['post']." | ".$likes['likesNum']." likes".'
                            <form action="includes/like.inc.php" method="post">

                            <input type="hidden" name="postid" value="'.$row['id'].'"/>

                            <input type="hidden" name="userid" value="'.$_SESSION['userid'].'"/>

                            <button type="submit" name="like-submit">Like</button>

                            </form>
                        '."</br>";
                        }else{
                            echo $username['username']." | ".$row['post']." | ".$likes['likesNum']." likes</br>";
                        }
                        
                    }
                }
            }
        ?>
        
    </main>

<?php
    require "footer.php";
?>