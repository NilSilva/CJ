<?php
    session_start();
?>
<!DOCTYPE html>
<html>

    <head>

    <meta charset="utf-8">
    <meat name="description" content="Exemplo de um site vulnerável a ClickJacking">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CJ - homepage</title>

    </head>

    <body>

        <style>

            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: #111;
            }

            .menubar {
                float: left;
                text-decoration: none;
                margin-left: 10px;
            }

            .menubar a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            .menubar a:hover {
                padding: 14px 16px;
                background-color: #000;
            }

            .headerlogo{
                float: left;
                max-height: 42px;
                width: auto;
                background-color: white;
                margin: 2px;
            }

            .signup{
                background-color:white;
                text-decoration: none;
                padding: 3px;
            }

            .loginform{
                float: right;
                margin-right: 10px;
                margin-top: 15px;
            }

        </style>

        <header>

            <nav>

                

                <ul>

                    <li>
                    
                        <a href="#">

                            <img src="img/logo.png" alt="Logo" class="headerlogo" />

                        </a>
                    
                    </li>

                    <li class="menubar"><a href="#">Privacidade</a></li>

                    <li class="menubar"><a href="#">Sobre mim</a></li>

                    <li class="menubar"><a href="#">Contacto</a></li>

                    <li class="menubar"><a href="index.php">Home</a></li>

                    <li><?php
                        if(isset($_SESSION['userid'])){
                            echo '<form action="includes/logout.inc.php" method="post" class="loginform">

                                    <button type="submit" name="logout-submit">Logout</button>
    
                                </form>';
                        }else{
                            echo '
                                <form action="includes/login.inc.php" method="post" class="loginform">

                                <input type="text" name="UserName" placeholder="Nome de utilizador"/>
        
                                <input type="password" name="password" placeholder="Introduzir a password"/>
        
                                <button type="submit" name="login-submit">Login</button>
        
                                <a href="signup.php" class="signup">Signup</a>
                                </form>';
                        }
                    ?></li>

                </ul>

            </nav>

        </header>