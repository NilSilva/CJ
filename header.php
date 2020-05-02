<!DOCTYPE>
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

            li {
                float: right;
            }

            li a:hover {
                padding: 14px 16px;
                background-color: #000;
            }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
            }

            .pad{
                padding: 14px 16px;
            }

        </style>

        <header>

            <nav>

                

                <ul>

                    <li style="float:left; padding: 2px 4px">
                    
                        <a href="#">

                            <img style="max-width:42px; height:auto; background-color: white;" src="img/logo.png" alt="Logo" />

                        </a>
                    
                    </li>

                    <li class="pad"><a href="index.php">Home</a></>

                    <li class="pad"><a href="#">Sobre mim</a></li>

                    <li class="pad"><a href="#">Contacto</a></li>

                    <li class="pad"><a href="#">Privacidade</a></li>

                </ul>

                <div>

                    <form action="includes/login.inc.php" method="post">

                        <input type="text" name="UserName" placeholder="Introduzir o nome de utilizador"/>

                        <input type="password" name="password" placeholder="Introduzir a password"/>

                        <button type="submit" name="login-submit">Login</button>

                    </form>

                    <a href="signup.php">Signup</a>

                    <form action="includes/logout.inc.php" method="post">

                        <button type="submit" name="logout-submit">Logout</button>

                    </form>

                </div>

            </nav>

        </header>